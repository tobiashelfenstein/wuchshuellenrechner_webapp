from flask import session

import json

class BaseModel():
    def __init__():
        pass

    def save():
        pass

class Project():
    def __init__(self, operation="", district="", manager="", location="", tax=True):
        #super.__init__()

        # initializes operation specific values as strings
        self.operation = operation
        self.district = district
        self.manager = manager
        self.location = location

        # initializes global sales tax as boolean
        self.tax = tax

        self.plants = None
        self.protection = None

    def save(self):
        session['Project'] = json.dumps(self, default=lambda o: o.__dict__,
            sort_keys=True, indent=4)


class Plants():
    def __init__(self, species=0, cost=0.0, preparation=0.0, planting=0.0, tending=0.0):
        #super.__init__()
        # species und cost fehlen noch!

        # initializes costs specific values as float
        self.preparation = preparation
        self.planting = planting
        self.tending = tending

    def save(self):
        session['Plants'] = json.dumps(self, default=lambda o: str(o),
            sort_keys=True, indent=4)
