{-# LANGUAGE DataKinds                  #-}
{-# LANGUAGE DeriveDataTypeable         #-}
{-# LANGUAGE DeriveGeneric              #-}
{-# LANGUAGE GeneralizedNewtypeDeriving #-}
{-# LANGUAGE OverloadedStrings          #-}
{-# LANGUAGE RecordWildCards            #-}
{-# LANGUAGE TypeOperators              #-}
{-# LANGUAGE ScopedTypeVariables        #-}
{-# LANGUAGE DuplicateRecordFields      #-}
{-# LANGUAGE RankNTypes                 #-}

module Snagshout.API.Types where

import           GHC.Generics       (Generic)
import           Data.Maybe (fromMaybe)
import           Data.Monoid ((<>))

import           Control.Lens       hiding ((.=))
import           Data.Aeson         (ToJSON, object, toJSON, (.=))
import           Data.Swagger       hiding (Response)
import           Data.Text          (Text)
import           Servant
import           Servant.Swagger
import           Servant.Swagger.UI
import           Data.Swagger.Internal.Schema
import           Data.HashMap.Strict.InsOrd (fromList)
import           Network.HTTP.Media.MediaType

import           Snagshout.API.JSON
import           Snagshout.API.QueryTypes

data Response a = Response
  { _rErrors  :: [Text]
  , _rError   :: Bool
  , _rCode    :: Maybe Int
  , _rStatus  :: Int
  , _rMessage :: Maybe Text
  , _rSuccess :: Bool
  , _rData    :: a
  , _rLinks   :: Maybe Links
  } deriving (Generic, Show)

instance (ToJSON a) => ToJSON (Response a) where
  toJSON = simpleGenericToJSON toCamel
instance (ToSchema a) => ToSchema (Response a) where
  declareNamedSchema x = do
    schema <- simpleGenericDeclareNamedSchema toCamel x
    dataSchema <- declareNamedSchema (Proxy :: Proxy a)

    let newName = fromMaybe "" (_namedSchemaName dataSchema) <> "Response"

    pure $ rename (Just newName) schema

data Links = Links
  { _lPrev  :: Text
  , _lNext  :: Text
  , _lPage  :: Int
  , _lLast  :: Int
  , _lLimit :: Int
  , _lTotal :: Int
  } deriving (Generic, Show)

instance ToJSON Links where
  toJSON = simpleGenericToJSON toCamel
instance ToSchema Links where
  declareNamedSchema = simpleGenericDeclareNamedSchema toCamel

data V1GetStatus = V1GetStatus
  { _v1srConnTime  :: Double
  , _v1srVersion   :: Text
  , _v1srStatus    :: Text
  , _v1srTimestamp :: Text
  } deriving (Generic, Show)

instance ToJSON V1GetStatus where
  toJSON = simpleGenericToJSON toSnake
instance ToSchema V1GetStatus where
  declareNamedSchema = simpleGenericDeclareNamedSchema toSnake

newtype V1GetCampaigns = V1Campaigns [Campaign]
  deriving (Generic, Show)

instance ToJSON V1GetCampaigns where
  toJSON = simpleGenericToJSON toCamel
instance ToSchema V1GetCampaigns where
  declareNamedSchema = simpleGenericDeclareNamedSchema toCamel

newtype V1GetCategories = V1GetCategories [Category]
  deriving (Generic, Show)

instance ToJSON V1GetCategories where
  toJSON = simpleGenericToJSON toCamel
instance ToSchema V1GetCategories where
  declareNamedSchema = simpleGenericDeclareNamedSchema toCamel

data Campaign = Campaign
  { _cId :: Int
  , _cName :: Text
  , _cDescription :: Text
  , _cNote :: Text
  , _cCountry :: Text
  , _cShoutChannels :: [Text]
  , _cUrl :: Text
  , _cShortUrl :: Text
  , _cAvailability :: Text
  , _cStartsAt :: Text
  , _cEndsAt :: Text
  , _cType :: Text
  , _cProduct :: Maybe Product
  , _cPromotions :: Maybe [Promotion]
  } deriving (Generic, Show)

instance ToJSON Campaign where
  toJSON = simpleGenericToJSON toCamel
instance ToSchema Campaign where
  declareNamedSchema = simpleGenericDeclareNamedSchema toCamel

data Product = Product
  { _pExternalUrl :: Text
  , _pMarketplace :: Text
  , _pName :: Text
  , _pKeywords :: Text
  , _pDescription :: Text
  , _pUrl :: Text
  , _pEan :: Text
  , _pCurrency :: Text
  , _pPrice :: Text
  , _pId :: Int
  , _pAmazonData :: Maybe AmazonData
  , _pMainCategory :: Maybe Category
  , _pFeaturedImage :: Maybe Image
  , _pMedia :: Maybe [Image]
  , _pShipping :: Maybe [Shipping]
  , _pAttributes :: Maybe [Attribute]
  , _pBookmarkedBy :: Maybe BookmarkMetadata
  } deriving (Generic, Show)

instance ToJSON Product where
  toJSON = simpleGenericToJSON toCamel
instance ToSchema Product where
  declareNamedSchema = simpleGenericDeclareNamedSchema toCamel

data AmazonData = AmazonData
  { _adAsin :: Text
  , _adMerchantId :: Text
  , _adFulfillment :: Text
  , _adStarRating :: Int
  , _adNumReviews :: Int
  , _adProductId :: Int
  , _adChildAsins :: [Text]
  } deriving (Generic, Show)

instance ToJSON AmazonData where
  toJSON = simpleGenericToJSON toCamel
instance ToSchema AmazonData where
  declareNamedSchema = simpleGenericDeclareNamedSchema toCamel

data Category = Category
  { _cId :: Text
  , _cName :: Text
  , _cShortName :: Text
  , _cImageUrl :: Text
  , _cTotalOffers :: Int
  } deriving (Generic, Show)

instance ToJSON Category where
  toJSON = simpleGenericToJSON toCamel
instance ToSchema Category where
  declareNamedSchema = simpleGenericDeclareNamedSchema toCamel

data Image = Image
  { _iUrl :: Text
  , _iTitle :: Text
  , _iType :: Text
  , _iId :: Int
  , _iSort :: Int
  , _iFeatured :: Bool
  , _iMetadata :: ImageMetadata
  } deriving (Generic, Show)

instance ToJSON Image where
  toJSON = simpleGenericToJSON toCamel
instance ToSchema Image where
  declareNamedSchema = simpleGenericDeclareNamedSchema toCamel

data ImageMetadata = ImageMetadata
  { _imOriginalSrc :: Text
  , _imSmall :: Text
  , _imMedium :: Text
  } deriving (Generic, Show)

instance ToJSON ImageMetadata where
  toJSON = simpleGenericToJSON toSnake
instance ToSchema ImageMetadata where
  declareNamedSchema = simpleGenericDeclareNamedSchema toSnake

data Shipping = Shipping
  { _sNote :: Text
  , _sPrice :: Text
  , _sId :: Int
  , _sDaysMin :: Int
  , _sDaysMax :: Int
  } deriving (Generic, Show)

instance ToJSON Shipping where
  toJSON = simpleGenericToJSON toCamel
instance ToSchema Shipping where
  declareNamedSchema = simpleGenericDeclareNamedSchema toCamel

data Attribute = Attribute
  { _aLabel :: Text
  , _aValue :: Text
  , _aId :: Int
  , _aSort :: Int
  } deriving (Generic, Show)

instance ToJSON Attribute where
  toJSON = simpleGenericToJSON toCamel
instance ToSchema Attribute where
  declareNamedSchema = simpleGenericDeclareNamedSchema toCamel

data BookmarkMetadata = BookmarkMetadata
  { _bmCount :: Int
  } deriving (Generic, Show)

instance ToJSON BookmarkMetadata where
  toJSON = simpleGenericToJSON toCamel
instance ToSchema BookmarkMetadata where
  declareNamedSchema = simpleGenericDeclareNamedSchema toCamel

data Promotion = Promotion
  { _pRestriction :: Maybe Text
  , _pNote :: Maybe Text
  , _pPrice :: Text
  , _pDailyLimit :: Int
  , _pId :: Int
  , _pSnaggedToday :: Int
  , _pSnaggableQuantity :: Int
  , _pBadges :: Maybe [Badge]
  , _pElegible :: Bool
  , _pPromoCode :: Maybe PromoCode
  } deriving (Generic, Show)

instance ToJSON Promotion where
  toJSON = simpleGenericToJSON toCamel
instance ToSchema Promotion where
  declareNamedSchema = simpleGenericDeclareNamedSchema toCamel

data PromoCode = PromoCode
  { _pcPromoCode :: Text
  , _pcOneTime :: Bool
  } deriving (Generic, Show)

instance ToJSON PromoCode where
  toJSON = simpleGenericToJSON toCamel
instance ToSchema PromoCode where
  declareNamedSchema = simpleGenericDeclareNamedSchema toCamel

data Badge = Badge
  {
  } deriving (Generic, Show)

instance ToJSON Badge where
  toJSON = simpleGenericToJSON toCamel
instance ToSchema Badge where
  declareNamedSchema = simpleGenericDeclareNamedSchema toCamel

type API
  = SwaggerSchemaUI "swagger-ui" "swagger.json"
  :<|> SnagshoutAPI

type SnagshoutAPI = "api" :> "v1" :> V1API

type V1API = V1GetStatusAPI :<|> V1GetCampaignsAPI :<|> V1GetCategoriesAPI

type V1GetStatusAPI = "status" :> Get '[JSON] (Response V1GetStatus)

type V1GetCategoriesAPI
  = "categories" :> Get '[JSON] (Response V1GetCategories)

type V1GetCampaignsAPI
  = "campaigns"
  :> QueryParam "search" String
  :> QueryParam "sort" String
  :> QueryParam "page" Int
  :> QueryParam "limit" Int
  :> QueryParam "embeds" String
  :> QueryParam "min" Int
  :> QueryParam "max" Int
  :> QueryParam "category" String
  :> QueryParam "min_quantity" Int
  :> QueryParam "min_percentage" Int
  :> QueryParam "max_percentage" Int
  :> QueryParam "started_after" String
  :> QueryParam "upcoming" Bool
  :> QueryParam "is_fba" Bool
  :> QueryParam "type" CampaignType
  :> Get '[JSON] (Response V1GetCampaigns)

api :: Proxy API
api = Proxy

snagshoutAPI :: Proxy SnagshoutAPI
snagshoutAPI = Proxy

v1API :: Proxy V1API
v1API = Proxy

swaggerDoc :: Swagger
swaggerDoc = toSwagger snagshoutAPI
  & info.title .~ "Snagshout API"
  & info.version .~ "v1"
  & info.description ?~ "The Snagshout API"
  & info.contact ?~ apiContact
  & host ?~ Host "www.snagshout.com" Nothing
  & schemes ?~ [Https]
  & securityDefinitions .~ fromList
    [("basic", SecurityScheme SecuritySchemeBasic Nothing)]
  & security .~ [SecurityRequirement $ fromList [("root", ["basic"])]]
  & consumes .~ MimeList ["application" // "json"]
  & produces .~ MimeList ["application" // "json"]
  -- Campaigns
  & applyTagsFor (tGet "/api/v1/campaigns")
    ["campaign" & description ?~ "Campaign operations"]
  & (tGet "/api/v1/campaigns") . operationId ?~ "getCampaigns"
  & (tGet "/api/v1/campaigns") . summary ?~ "Search for campaigns"
  -- Categories
  & applyTagsFor (tGet "/api/v1/categories")
    ["category" & description ?~ "Category operations"]
  & (tGet "/api/v1/categories") . operationId ?~ "getCategories"
  & (tGet "/api/v1/categories") . summary ?~ "Get all categories"
  -- Status
  & applyTagsFor (tGet "/api/v1/status")
    ["front" & description ?~ "Other operations"]
  & (tGet "/api/v1/status") . operationId ?~ "getStatus"
  & (tGet "/api/v1/status") . summary ?~ "Get system status"

  where
    apiContact = mempty
      & name ?~ "Seller Labs"
      & email ?~ "support@sellerlabs.com"
      & url ?~ URL "https://www.sellerlabs.com"

    tGet :: FilePath -> Traversal' Swagger Operation
    tGet path = operationsOf
      $ (mempty :: Swagger)
      & paths .~ fromList [(path, mempty & get ?~ mempty)]
