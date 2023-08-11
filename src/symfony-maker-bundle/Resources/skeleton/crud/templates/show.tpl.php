<?= $helper->getHeadPrintCrudCode("Show ".$entity_class_name) ?>

{% block breadcrumbItem %}
    <li class="breadcrumb-item"> <a href="{{ path('<?= $route_name ?>_index') }}">master</a> </li>
    <li class="breadcrumb-item"> <a href="{{ path('<?= $route_name ?>_index') }}">task</a> </li>
    <li class="breadcrumb-item active"> edit </li>
{% endblock %}

{% block content %}
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Task</h6>
        </div>
        <div class="card-body">

            <table class="table">
                <tbody>
                    <?php foreach ($entity_fields as $field): ?>
                    <tr>
                        <th><?= ucfirst($field['fieldName']) ?></th>
                        <td>{{ <?= $helper->getEntityFieldPrintCode($entity_twig_var_singular, $field) ?> }}</td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <a href="{{ path('<?= $route_name ?>_index') }}">back to list</a>

            <a href="{{ path('<?= $route_name ?>_edit', {'<?= $entity_identifier ?>': <?= $entity_twig_var_singular ?>.<?= $entity_identifier ?>}) }}">edit</a>

            {{ include('<?= $templates_path ?>/_delete_form.html.twig') }}
                </div>
            </div>
{% endblock %}
