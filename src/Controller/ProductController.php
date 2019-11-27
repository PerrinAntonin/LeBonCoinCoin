<?php

namespace App\Controller;

use App\Entity\Product;

use App\Form\PublishProductType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

class ProductController extends AbstractController
{
    /**
     * @Route("/publishproduct", name="publishproduct")
     */
    public function CreateProduct(Request $request, EntityManagerInterface $em, Security $security)
    {
        $product = new Product();
        $form = $this->createForm(PublishProductType::class,$product);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $article = $form->getData(); // On récupère l'article associé
            $article->setUserId($security->getUser());
            $article->setPublishdate(New \DateTime());

            /*
            $file = $article->getFileName();
            //dd($article);
            $filename = md5(uniqid()).'.'.$file->guessExtension();
            $file->move($this->getParameter('upload_directory'),$filename);*/

            $em->persist($article); // on le persiste
            $em->flush(); // on save

            return $this->redirectToRoute('index'); // Hop redirigé et on sort du controller
        }
        if( !$security->isGranted('IS_AUTHENTICATED_FULLY') ){
            return $this->redirectToRoute('app_login');
        }
        return $this->render('product/publishproduct.html.twig', ['form' => $form->createView()]); // on envoie ensuite le formulaire au template
    }
}
