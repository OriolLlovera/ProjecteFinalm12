<?php

namespace BackEndBundle\Controller;
use BackEndBundle\Entity\idioma;
use BackEndBundle\Entity\catgramatical;
use BackEndBundle\Entity\catfamilia;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BackEndBundle:Default:index.html.twig');
    }

    #LLISTES DADES
    public function llistaUsuarisAction()
    {
        $llista = $this->getDoctrine()->getRepository('BackEndBundle:User')->findAll();

        return $this->render('BackEndBundle:Default:llistaUsuaris.html.twig', array(
            'titol' => 'Llistat usuaris',
            'User' => $llista));
    }

    public function llistaIdiomaAction()
    {
        $llista = $this->getDoctrine()->getRepository('BackEndBundle:idioma')->findAll();

        return $this->render('BackEndBundle:Default:llistaIdiomes.html.twig', array(
            'titol' => 'Llistat idiomes',
            'idioma' => $llista));
    }

    public function llistaCatFamiliaAction()
    {
        $llista = $this->getDoctrine()->getRepository('BackEndBundle:catfamilia')->findAll();

        return $this->render('BackEndBundle:Default:llistaCatFamilia.html.twig', array(
            'titol' => 'Llistat Categories Família',
            'catfamilia' => $llista));
    }

    public function llistaCatGramaticalAction()
    {
        $llista = $this->getDoctrine()->getRepository('BackEndBundle:catgramatical')->findAll();

        return $this->render('BackEndBundle:Default:llistaCatGramatical.html.twig', array(
            'titol' => 'Llistat Categories Gramaticals',
            'catgramatical' => $llista));
    }

    #AFEGIR DADES IDIOMA
    public function afegirIdiomaAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $nom=$request->request->get('nom');

        $idioma = new idioma();
        $idioma->setNom($nom);

        $em->persist($idioma);
        $em->flush();

        return $this->forward('BackEndBundle:Default:llistaIdioma');
    }

    public function formAfegirIdiomaAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $nom = "";

        return $this->render('BackEndBundle:Default:idiomes.html.twig', array(
            'nom' => $nom,
            )
        );
    }

    #EDITAR DADES IDIOMA
    public function editarIdiomaAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $idioma =$em->getRepository('BackEndBundle:idioma')->findOneById($id);
        
        $nom=$request->request->get('nom');

        
        $idioma->setNom($nom);
        $em->persist($idioma);
        $em->flush();

        return $this->forward('BackEndBundle:Default:llistaIdioma');
        
    }

    public function formEditarIdiomaAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $idioma =$this->getDoctrine()->getRepository('BackEndBundle:idioma')->findOneById($id);
        $nom=$idioma->getNom();

        return $this->render('BackEndBundle:Default:idiomesEditar.html.twig', array(
            'id' => $id,
            'nom' => $nom,
            )
        );
        
    } 

    #ESBORRAR IDIOMA
    public function esborrarIdiomaAction($id)
    {
        $idioma =$this->getDoctrine()->getRepository('BackEndBundle:idioma')->findOneById($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($idioma);
        $em->flush();
        return $this->forward('BackEndBundle:Default:llistaIdioma');
    }


    #AFEGIR DADES CAT. GRAMATICAL
    public function afegirCatGramaticalAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $nom=$request->request->get('nom');

        $catgramatical = new catgramatical();
        $catgramatical->setNom($nom);

        $em->persist($catgramatical);
        $em->flush();

        return $this->forward('BackEndBundle:Default:llistaCatGramatical');
    }

    public function formAfegirCatGramaticalAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $nom = "";

        return $this->render('BackEndBundle:Default:catgramatical.html.twig', array(
            'nom' => $nom,
            )
        );
    }

    #EDITAR DADES CAT. GRAMATICAL
    public function editarCatGramaticalAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $catgramatical =$em->getRepository('BackEndBundle:catgramatical')->findOneById($id);
        
        $nom=$request->request->get('nom');

        
        $catgramatical->setNom($nom);
        $em->persist($catgramatical);
        $em->flush();

        return $this->forward('BackEndBundle:Default:llistaCatGramatical');
        
    }

    public function formEditarCatGramaticalAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $catgramatical =$this->getDoctrine()->getRepository('BackEndBundle:catgramatical')->findOneById($id);
        $nom=$catgramatical->getNom();

        return $this->render('BackEndBundle:Default:catgramaticalEditar.html.twig', array(
            'id' => $id,
            'nom' => $nom,
            )
        );
        
    } 

    #ESBORRAR CAT. GRAMATICAL
    public function esborrarCatGramaticalAction($id)
    {
        $catgramatical =$this->getDoctrine()->getRepository('BackEndBundle:catgramatical')->findOneById($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($catgramatical);
        $em->flush();
        return $this->forward('BackEndBundle:Default:llistaCatGramatical');
    }

    #AFEGIR DADES CAT. FAMILIA
    public function afegirCatFamiliaAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $nom=$request->request->get('nom');

        $catfamilia = new catfamilia();
        $catfamilia->setNom($nom);

        $em->persist($catfamilia);
        $em->flush();

        return $this->forward('BackEndBundle:Default:llistaCatFamilia');
    }

    public function formAfegirCatFamiliaAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $nom = "";

        return $this->render('BackEndBundle:Default:catfamilia.html.twig', array(
            'nom' => $nom,
            )
        );
    }

    #EDITAR DADES CAT. FAMILIA
    public function editarCatFamiliaAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $catfamilia =$em->getRepository('BackEndBundle:catfamilia')->findOneById($id);
        
        $nom=$request->request->get('nom');

        
        $catfamilia->setNom($nom);
        $em->persist($catfamilia);
        $em->flush();

        return $this->forward('BackEndBundle:Default:llistaCatFamilia');
        
    }

    public function formEditarCatFamiliaAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $catfamilia =$this->getDoctrine()->getRepository('BackEndBundle:catfamilia')->findOneById($id);
        $nom=$catfamilia->getNom();

        return $this->render('BackEndBundle:Default:catfamiliaEditar.html.twig', array(
            'id' => $id,
            'nom' => $nom,
            )
        );
        
    } 

    #ESBORRAR CAT. FAMILIA
    public function esborrarCatFamiliaAction($id)
    {
        $catfamilia =$this->getDoctrine()->getRepository('BackEndBundle:catfamilia')->findOneById($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($catfamilia);
        $em->flush();
        return $this->forward('BackEndBundle:Default:llistaCatFamilia');
    }



}
