<?= "<?php\n" ?>

namespace <?= $namespace ?>;

<?= $use_statements; ?>

class <?= $class_name ?> extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('search', null, ['required' => false]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        // Configure your form options here
    }
}
