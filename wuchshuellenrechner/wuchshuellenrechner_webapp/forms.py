from flask_wtf import FlaskForm
from wtforms import StringField, BooleanField, SubmitField, SelectField, DecimalField, FieldList
from wtforms.validators import DataRequired

class ProjectForm(FlaskForm):
    operation = StringField('Forstbetrieb')
    district = StringField('Forstrevier')
    manager = StringField('Revierleitung')
    location = StringField('Waldort')
    tax = BooleanField('Mehrwertsteuer')
    submit = SubmitField('Pflanzen hinterlegen')

class PlantsForm(FlaskForm):
    # species specifig parameters
    species = FieldList(SelectField('Baumart', choices=[('tei', 'Trauben-Eiche'), ('bu', 'Rot-Buche')]), min_entries=1, max_entries=10)
    cost = FieldList(DecimalField('Stückkosten'), min_entries=1, max_entries=10)

    # area specific parameters
    preparation = DecimalField('Kulturvorbereitungskosten')
    planting = DecimalField('Pflanzungskosten')
    tending = DecimalField('Kultursicherungskosten (5 Jahre)')
    submit = SubmitField('Schutz hinterlegen')

class ProtectionForm(FlaskForm):
    protection = SelectField('Schutzvariante', choices=[('z', 'Zaun'), ('t', 'Wuchshülle')])
    submit = SubmitField('Schutzvariante hinzufügen')

class ProtectionEditForm(FlaskForm):
    model = SelectField('Wuchshüllentyp', choices=[('120', 'Tubex Ventex (120 cm)'), ('150', 'Tubex Ventex (150 cm)')])
    cost = DecimalField('Stückkosten')
    accessories = DecimalField('Zubehörkosten')
    installation = DecimalField('Aufbaukosten')
    maintenance = DecimalField('Unterhaltungskosten')
    removal = DecimalField('Abbaukosten')
    submit = SubmitField('Schutzvariante hinzufügen')
