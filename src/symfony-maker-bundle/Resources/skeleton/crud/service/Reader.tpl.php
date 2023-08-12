<?= "<?php\n" ?>

namespace <?= $namespace ?>;

<?= $use_statements; ?>

class Reader
{
    private $<?= $entity_class_name ?>Repository;

    public function __construct(
        <?= $entity_class_name ?>Repository $<?= $entity_var_singular ?>Repository,
        EntityManagerInterface $em,
        PaginatorInterface $paginator
    ) {
        $this->cobabcRepository = $cobabcRepository;
        $this->em = $em;
        $this->paginator = $paginator;
    }

    public function getData(?Array $dataFilter, ?User $user)
    {
        $queryBuilder = $this-><?= $entity_var_singular ?>Repository
            ->createQueryBuilder('<?= $entity_var_singular ?>')
            //->leftJoin('task.author', 'author')
            ->orderBy('<?= $entity_var_singular ?>.id', 'ASC');

        $search = strtolower(@$dataFilter['search']);
        $queryBuilder->where('LOWER(cobabc.name) like :name')
        ->setParameter('name', "%$search%");

        if ($user instanceof User) {
            $queryBuilder->andWhere('author.id = :author_id')
            ->setParameter('author_id', $user->getId());
        }

        $page = ((int)@$dataFilter['page'] == 0) ? 1 : $dataFilter['page'];
        $<?= $entity_var_singular ?> = $this->paginator->paginate(
            $queryBuilder->getQuery(),
            $page,
            10
        );

        return $<?= $entity_var_singular ?>;
    }
}

/*
// use App\Repository\<?= $entity_class_name ?>Repository;
// use App\Entity\<?= $entity_class_name ?>;
// use Doctrine\ORM\EntityManagerInterface;
// use Knp\Component\Pager\PaginatorInterface;
// use App\Entity\User;
*/