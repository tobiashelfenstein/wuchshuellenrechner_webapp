from flask import render_template, flash, redirect, url_for
from wuchshuellenrechner_webapp import wuchshuellenrechner_webapp
from wuchshuellenrechner_webapp.forms import ProjectForm

@wuchshuellenrechner_webapp.route('/')
@wuchshuellenrechner_webapp.route('/index')
def index():
    return render_template('index.html', title='Startseite')

@wuchshuellenrechner_webapp.route('/project', methods=['GET', 'POST'])
def project():
    form = ProjectForm()
    if form.validate_on_submit():
        flash('Hallo')
        return redirect(url_for('index'))
    return render_template('project.html', title='Neues Projekt', form=form)
