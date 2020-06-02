<?php

namespace App\Controller;

use App\Entity\Tablahij;
use App\Entity\Tablamae;
use App\Form\PadreType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PadreController extends AbstractController
{
    /**
     * @Route("/padre", name="padre")
     */
    public function index(Request $request)
    {
        $hijo1 = new Tablahij();
        $hijo2 = new Tablahij();
        $hijo3 = new Tablahij();
        $hijo4 = new Tablahij();
        $hijo5 = new Tablahij();
        $hijo6 = new Tablahij();
        $hijo1->setTipo('F');
        $hijo2->setTipo('T');
        $hijo3->setTipo('N');
        $hijo4->setTipo('F');
        $hijo5->setTipo('T');
        $hijo6->setTipo('N');
        $padre = new Tablamae();
        $padre->setNombre('Es prueba');
        $padre->addHijo($hijo1);
        $padre->addHijo($hijo2);
        $padre->addHijo($hijo3); /*
         $padre->addHijo($hijo4);
        $padre->addHijo($hijo5);
        $padre->addHijo($hijo6);
 */
        $form = $this->createForm(PadreType::class, $padre);
        //$hijos= $padre->getHijos(); 

        $hijosform = $form->get('hijos') ;

//        var_dump($hijosform);

        foreach ($hijosform as $hijo ) {
            //dd($hijo);
            $tipo = $hijo->get('tipo');
            $valor = $tipo->getData('tipo');

            if ($valor == 'F' ) {
                $hijo->remove('valor');
            } else {
                $hijo->remove('valorfecha');
            }
        }


        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $otropadre = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $otrosHijos = $otropadre->getHijos();

            foreach ($otrosHijos as $hijo ) {

                if ($hijo->getTipo() == 'F' ) {
                    $hijo->setValor(date_format($hijo->getvalorfecha(), "d/m/Y"));
                }
            }
            $em->persist($otropadre);
            $em->flush();

            return $this->redirectToRoute('padre');

        }

        $campos=$padre->getHijos();

        return $this->render('padre/index.html.twig', [
            'controller_name' => 'PadreController',
            'form' => $form->createView(),
            'campos'=> $campos
        ]);
    }
}
