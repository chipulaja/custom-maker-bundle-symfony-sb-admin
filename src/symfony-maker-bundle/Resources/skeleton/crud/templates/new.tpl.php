<?= $helper->getHeadPrintCrudCode('Add New '.$entity_class_name); ?>

{% block breadcrumbItem %}
    <li class="breadcrumb-item"> <a href="{{ path('<?= $route_name ?>_index') }}">master</a> </li>
    <li class="breadcrumb-item"> <a href="{{ path('<?= $route_name ?>_index') }}">task</a> </li>
    <li class="breadcrumb-item active"> new </li>
{% endblock %}

{% block content %}
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add New Task</h6>
        </div>
        <div class="card-body">        
            {{ include('<?= $templates_path ?>/_form.html.twig') }}
        </div>
    </div>
{% endblock %}
