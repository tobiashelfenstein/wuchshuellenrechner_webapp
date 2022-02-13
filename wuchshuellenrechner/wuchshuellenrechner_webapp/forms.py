from flask_wtf import FlaskForm
from wtforms import StringField, BooleanField, SubmitField
from wtforms.validators import DataRequired

class ProjectForm(FlaskForm):
    operation = StringField('Forstbetrieb')
    district = StringField('Forstrevier')
    manager = StringField('Revierleitung')
    location = StringField('Waldort')
    tax = BooleanField('Mehrwertsteuer')
    submit = SubmitField('Pflanzen hinterlegen')
