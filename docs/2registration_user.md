16min 10// voir TRT conseil

3/ symfony console make:registration-form YES + Doit on envoyer un mail de confirmation par un bundle (no) + YES (authentification après l’enregistrement SECURITE)

created: src/Controller/RegistrationController.php : modifier la route en français -> inscription

mettre le $user->setRoles(["ROLE_USER"])

src/Form/RegistrationFormType.php, dans le builder on ajoute différents champs que je vais personnaliser en fonction de les critères de ma Base de Données voir le formulaire création UsersType!!!

changer le nom de la class correspond au nom du fichier FormTYpe (si j'en ai plusieurs)
mettre la classe heritage sporthall ou partner.

Je mets Le RGPDConsent à la place de agreeTerms

---

Modifier aussitôt dans templates/registration/register.html.twig agreeTerms par RGPDConsent
Franciser le template +

{% extends 'base.html.twig' %}

{% block title %}Inscription{% endblock %}

{% block body %}
<section class="container">
<div class="row">
<div class="col">
<h1>Inscription</h1>

                {{ form_start(registrationForm) }}
                    <fieldset class="mb-3">
                        <legend>Mon identité</legend>
                        {{ form_row(registrationForm.lastname) }}
                        {{ form_row(registrationForm.firstname) }}
                        {{ form_row(registrationForm.email) }}
                    </fieldset>

                    <fieldset class="mb-3">
                        <legend>Mes coordonnées</legend>
                        {{ form_row(registrationForm.address) }}
                        {{ form_row(registrationForm.zipcode) }}
                        {{ form_row(registrationForm.city) }}
                    </fieldset>
                    {{ form_row(registrationForm.plainPassword, {
                        label: 'Password'
                    }) }}
                    {{ form_row(registrationForm.RGPDConsent) }}

                    <button type="submit" class="btn btn-primary btn-lg my-3">M'inscrire</button>
                    <a href="{{ path('app_login') }}" class="btn btn-secondary">Me connecter</a>
                {{ form_end(registrationForm) }}
            </div>
        </div>
    </section>

{% endblock %}

---

dans RegsitrationForm je modifie les champs en utilisant EmailType, TextType, CheckboxType avec le paramètre attr

mettre des attributs (class aussi pour plainpassword!! Ne pas oublier)

---

Faire un essai de connexion

---

Modification de la nav dans \_header

<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
				{% if app.user %}
                    <li class="nav-item">
                        <a class="nav-link" href="#">Mon compte</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ path('app_logout') }}">Me déconnecter</a>
                    </li>
                {% else %}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ path('app_register') }}">M'inscrire</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ path('app_login') }}">Me Connecter</a>
                    </li>
				{% endif %}
			</ul>
