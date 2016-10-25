{-# LANGUAGE DeriveGeneric     #-}
{-# LANGUAGE OverloadedStrings #-}

module Snagshout.API.QueryTypes where

import           Data.Text
import           GHC.Generics

import           Data.Swagger
import           Web.HttpApiData

import           Snagshout.API.JSON

data CampaignType = Standard | Syndicated
  deriving (Generic, Show)

instance FromHttpApiData CampaignType where
  parseQueryParam "standard"   = Right Standard
  parseQueryParam "syndicated" = Right Syndicated
  parseQueryParam x            = Left x

instance ToParamSchema CampaignType where
  toParamSchema = enumGenericToParamSchema Nothing toSnake
