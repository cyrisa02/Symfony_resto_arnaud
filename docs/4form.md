Dans les formulaires pour écarter les checkbox

'attr' => [
'class' => 'd-flex justify-content-around',
],

     Pour mot de passe et RGPD et photo

      'label_attr' => [
                    'class' => 'form-label  mt-4'
                ],




     LISTE DEROULANTE

->add('sports', EntityType::class, [
'class' => Childsport::class,  
 'label' => 'Les activités',  
 'choice_label' => 'title',

            ])


CASE A COCHER  
->add('sports', EntityType::class, [
'class' => Childsport::class,  
 'label' => 'Les activités',
'label_attr' => [
'class' => 'form-label mt-4 '
],
'choice_label' => 'title',
'multiple' => true,
'expanded' => true,
'attr' => [
'class' => 'd-flex justify-content-around',
],
])

       BOUTON RADIO

->add('sports', EntityType::class, [
'class' => Childsport::class,  
 'label' => 'Les activités',
'label_attr' => [
'class' => 'form-label mt-4 '
],
'choice_label' => 'title',
'expanded' => true,  
 'attr' => [
'class' => 'd-flex justify-content-around',
],
])

            LISTE DE CHOIX

->add('sports', EntityType::class, [
'class' => Childsport::class,  
 'label' => 'Les activités',
'label_attr' => [
'class' => 'form-label mt-4 '
],
'choice_label' => 'title',
'multiple' => true,  
 'attr' => [
'class' => 'd-flex justify-content-around',
],
])

            EN ONE TO ONE


->add('sports', EntityType::class, [
'class' => Childsport::class,  
 'label' => 'Les activités',
'label_attr' => [
'class' => 'form-label mt-4 '
],
'choice_label' => 'title',

            ])

---

 <div class="form-group d-none">
			{{ form_label(form.isVisible) }}
			{{ form_widget(form.isVisible) }}
			<div class="form-error">
				{{ form_errors(form.isVisible) }}
			</div>
		</div> 
		
		
		
	Dans le formulaire           'required' => false,
