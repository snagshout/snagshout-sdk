{-# LANGUAGE FlexibleContexts  #-}
{-# LANGUAGE OverloadedStrings #-}

module Snagshout.API.JSON where

import           Data.Char                         (toLower, toUpper)
import           Data.Monoid                       ((<>))
import           GHC.Generics                      (Generic, Rep)

import           Data.Aeson                        (Value, genericToJSON)
import           Data.Aeson.Casing                 (aesonDrop, aesonPrefix,
                                                    camelCase)
import           Data.Aeson.Casing.Internal        (dropFPrefix)
import           Data.Aeson.Types                  (GFromJSON, GToJSON,
                                                    Options (..), Parser,
                                                    camelTo2, defaultOptions,
                                                    genericParseJSON)
import qualified Data.Swagger                      as S
import           Data.Swagger.Declare
import           Data.Swagger.Internal.ParamSchema
import           Data.Swagger.Internal.Schema
import qualified Data.Swagger.ParamSchema          as PS
import           Data.Text                         (Text)
import qualified Data.Text                         as T

toSnake :: String -> String
toSnake = camelTo2 '_'

toCamel :: String -> String
toCamel = camelCase

simpleAesonOptions :: (String -> String) -> Options
simpleAesonOptions modifier = (aesonPrefix modifier)
  { omitNothingFields = True
  , constructorTagModifier = fmap toLower
  }

-- | A shortcut for `genericToJSON simpleAesonOptions`.
simpleGenericToJSON
  :: (Generic a, GToJSON (Rep a))
  => (String -> String)
  -> a
  -> Value
simpleGenericToJSON modifier = genericToJSON (simpleAesonOptions modifier)

simpleGenericDeclareNamedSchema
  :: (Generic a, GToSchema (Rep a))
  => (String -> String)
  -> proxy a
  -> Declare (S.Definitions S.Schema) S.NamedSchema
simpleGenericDeclareNamedSchema modifier = S.genericDeclareNamedSchema
  $ S.defaultSchemaOptions
    { S.fieldLabelModifier = modifier . dropFPrefix
    , S.constructorTagModifier = fmap toLower
    }

enumGenericToParamSchema
  :: (Generic a, GToParamSchema (Rep a))
  => Maybe Text
  -> (String -> String)
  -> proxy a
  -> S.ParamSchema t
enumGenericToParamSchema prefix modifier = PS.genericToParamSchema
  $ PS.defaultSchemaOptions
    { S.fieldLabelModifier = modifier . dropFPrefix
    , S.constructorTagModifier
        = \x -> (T.unpack $ maybe "" (<> "_") prefix) <> modifier x
    }
