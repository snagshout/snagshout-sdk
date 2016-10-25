module Main where

import           Network.Wai.Handler.Warp
import           Servant
import           Servant.Swagger.UI

import           Snagshout.API.Types

main :: IO ()
main = do
  putStrLn "Running on port 8000"
  run 8000 $ serve api server

server :: Server API
server = swaggerSchemaUIServer swaggerDoc :<|> error "not implemented"
