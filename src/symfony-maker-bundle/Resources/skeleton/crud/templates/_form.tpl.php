{{ form_start(form, {'attr': {'class':'form-horizontal'}} ) }}
    
<?php foreach ($fields as $form_field => $typeOptions): ?>
    <div class="form-group row">
        {{ form_label(form.<?= $form_field ?>, '<?= $form_field ?>', {'label_attr': {'class': 'col-sm-2 control-label'}}) }}
        <div class="col-sm-10">
            {{ form_widget(form.<?= $form_field ?>, {'attr': {'class': 'form-control'}}) }}
            {{ form_errors(form.<?= $form_field ?>) }}
        </div>
    </div>
<?php endforeach; ?>

    <div class="text-right py-0">
        <a href="{{ path('<?= $route_name ?>_index') }}" class="btn btn-secondary text-right px-3 mx-3">back to list</a>
        <button class="btn btn-primary float-lg-right">{{ button_label|default('Save') }}</button>
    </div>
{{ form_end(form) }}

{% block javascripts %}
    <!-- <script defer src="{{ asset('js/master/task.js') }}"></script> -->
{% endblock %}
