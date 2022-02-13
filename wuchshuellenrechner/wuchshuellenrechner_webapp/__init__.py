from flask import Flask
from config import Config

wuchshuellenrechner_webapp = Flask(__name__)
wuchshuellenrechner_webapp.config.from_object(Config)

from wuchshuellenrechner_webapp import routes
