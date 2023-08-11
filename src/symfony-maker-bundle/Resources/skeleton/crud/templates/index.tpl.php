<?= $helper->getHeadPrintCrudCode($entity_class_name.' index'); ?>

{% block breadcrumbItem %}
    <li class="breadcrumb-item"> <a href="{{ path('<?= $route_name ?>_index') }}">master</a> </li>
    <li class="breadcrumb-item active"> user </li>
{% endblock %}

{% block content %}
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $entity_class_name ?> List</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <nav class="navbar p-0 py-3">
                    {{ form_start(form, {'attr': {'class':'form-inline'}} ) }}
                        <div class="input-group">
                            {{ form_widget(form.search, {'attr': {'class': 'form-control', 'placeholder': 'Search', 'aria-describedby': 'basic-addon2'}}) }}
                            <div class="input-group-append">
                                <span class="input-group-text p-0" id="basic-addon2">
                                    <button class="btn btn-link py-0">
                                        <i class="fas fa-fw fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                    {{ form_end(form) }}
                    <a href="{{ path('<?= $route_name ?>_new') }}" class="btn btn-success pull-right">
                        Add <i class="fas fa-fw fa-plus"></i>
                    </a>
                </nav>

                <table class="table">
                    <thead>
                        <tr>
            <?php foreach ($entity_fields as $field): ?>
                            <th><?= ucfirst($field['fieldName']) ?></th>
            <?php endforeach; ?>
                            <th>actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    {% for <?= $entity_twig_var_singular ?> in <?= $entity_twig_var_plural ?> %}
                        <tr>
            <?php foreach ($entity_fields as $field): ?>
                            <td>{{ <?= $helper->getEntityFieldPrintCode($entity_twig_var_singular, $field) ?> }}</td>
            <?php endforeach; ?>
                            <td>
                                <a href="{{ path('<?= $route_name ?>_edit', {'<?= $entity_identifier ?>': <?= $entity_twig_var_singular ?>.<?= $entity_identifier ?>}) }}" class="px-2 py-0 d-inline-block" title="edit">
                                    <i class="fas fa-fw fa-edit text-primary"></i>
                                </a>
                                <form name="task" method="post" action="{{ path('<?= $route_name ?>_delete', {'<?= $entity_identifier ?>': <?= $entity_twig_var_singular ?>.<?= $entity_identifier ?>}) }}" class="d-inline-block">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token('delete' ~ <?= $entity_twig_var_singular ?>.<?= $entity_identifier ?>) }}">
                                    <button class="btn btn-link pl-2 pr-0 py-0 open-delete-modal">
                                        <i class="fas fa-fw fa-trash-alt text-danger"></i>
                                    </button>
                                </form>

                            </td>
                        </tr>
                    {% else %}
                        <tr>
                            <td colspan="<?= (count($entity_fields) + 1) ?>">no records found</td>
                        </tr>
                    {% endfor %}
                    </tbody>
                </table>


                <div class="row m-0">
                    <div class="col-md-8 p-0">
                        Showing {{ <?= $entity_twig_var_plural ?>.getPaginationData.firstItemNumber }} to {{ <?= $entity_twig_var_plural ?>.getPaginationData.lastItemNumber }} of {{ <?= $entity_twig_var_plural ?>.getPaginationData.totalCount }} entries.
                    </div>
                    <div class="col-md-4 p-0">
                        {{ knp_pagination_render(<?= $entity_twig_var_plural ?>) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
{% endblock %}
