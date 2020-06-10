<?php


namespace App\Controller;


use App\Entity\Spot;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Serializer;

/**
 * Class SpotController
 * @package App\Controller
 * @Route("/spots")
 */
//TODO:
//Une prestation a plusieurs spots pour chaque spot une periode:
    //Chaque periode contient les:
    //   Sous_type_p: (ex: handicap, road trip, cours particulier)
    //   age-category
    //   niveaux
//Un Spot contient plusieurs prestations:
    //   exception si prestation de ce type est deja existante pour cette periode
    //   exeption si le spot est payant verif si place restante
//  //   exeption si le proff est deja reserver par autre user

class SpotController extends AbstractController
{
    const SPOTS = [
        [
            'id' => 1,
            'title' => 'hello worl',
            'slug' => 'This is the last example'
        ],
        [
            'id' => 2,
            'title' => 'coucou',
            'slug' => 'This is the last example2'
        ],
        [
            'id' => 3,
            'title' => 'hello world 3',
            'slug' => 'This is the last example3'
        ],
    ];
    /**
     * @Route("/page/{page}", name="spot_list", defaults={"page": 5}, requirements={"page"="\d+"})
     */
    public function list($page) {
        $repository = $this->getDoctrine()->getRepository(Spot::class);
        $items = $repository->findAll();
        return $this->json(
            [
                "page" => $page,
                "limit" => 20,
                "spots" => array_map(function (Spot $spot) {
                    return $this->generateUrl("spot_by_id",["id" => $spot->getId() ]);
                    }, $items)
            ]
        );
    }

    /**
     * @Route("/{id}", name="spot_by_id", methods={"GET"}, requirements={"id"="\d+"})
     * @param Spot $spot
     * @return JsonResponse
     */
    public function post(Spot $spot) {
        return  $this->json($spot);
    }

    /**
     * @Route("/{slug}", name="spot_by_slug", methods={"GET"})
     * @param $slug
     * @return JsonResponse
     */
    public function postBySlug($slug) {
        /**
         * @var Spot $spot
         */


        return $this->json($this->getDoctrine()->getRepository(Spot::class)->findOneBy(["slug" => $slug ]));

    }

    /**
     * @Route("/add", name="spot_add", methods={"POST"})
     */
    public function add(Request $request)
    {
        /**
         * @var Serializer $serializer
         */
        $serializer = $this->get("serializer");
        $spot = $serializer->deserialize($request->getContent(), Spot::class, 'json');

        $em = $this->getDoctrine()->getManager();
        $em->persist($spot);
        $em->flush();

        return $this->json($spot);

    }

    /**
     * @Route( "/{id}", name="spot_delete", methods={"DELETE"})
     */
    public function delete(Spot $spot)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($spot);
        $em->flush();
        return $this->json(null, Response::HTTP_NO_CONTENT);
    }
}