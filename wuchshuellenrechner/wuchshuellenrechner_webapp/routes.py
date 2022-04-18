from flask import render_template, flash, redirect, url_for
from wuchshuellenrechner_webapp import wuchshuellenrechner_webapp
from wuchshuellenrechner_webapp.forms import ProjectForm
from wuchshuellenrechner_webapp.forms import PlantsForm
from wuchshuellenrechner_webapp.forms import ProtectionForm
from wuchshuellenrechner_webapp.forms import ProtectionEditForm

from wuchshuellenrechner_webapp.models import Project
from wuchshuellenrechner_webapp.models import Plants

@wuchshuellenrechner_webapp.route('/')
@wuchshuellenrechner_webapp.route('/index')
def index():
    return render_template('index.html', title='Startseite')

@wuchshuellenrechner_webapp.route('/project', methods=['GET', 'POST'])
def project():
    form = ProjectForm()
    if form.validate_on_submit():
        new_project = Project(
            operation=form.operation.data,
            district=form.district.data,
            manager=form.manager.data,
            location=form.location.data,
            tax=form.tax.data
        )

        new_project.save()

        return redirect(url_for('plants'))
    return render_template('project.html', title='Neues Projekt', form=form)

@wuchshuellenrechner_webapp.route('/plants', methods=['GET', 'POST'])
def plants():
    form = PlantsForm()
    if form.validate_on_submit():
        new_plants = Plants(
            preparation=form.preparation.data,
            planting=form.planting.data,
            tending=form.tending.data
        )

        new_plants.save()

        return redirect(url_for('protection'))
    return render_template('plants.html', title='Pflanzen', form=form)

@wuchshuellenrechner_webapp.route('/protection', methods=['GET', 'POST'])
def protection():
    form = ProtectionForm()
    if form.validate_on_submit():
        return redirect(url_for('index'))
    return render_template('protection.html', title='Schutzvarianten', form=form)

@wuchshuellenrechner_webapp.route('/protection_edit', methods=['GET', 'POST'])
def protection_edit():
    form = ProtectionEditForm()
    if form.validate_on_submit():
        return redirect(url_for('index'))
    return render_template('protection_edit.html', title='Schutzvarianten', form=form)
