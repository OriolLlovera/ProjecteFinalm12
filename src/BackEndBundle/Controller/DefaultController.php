<?php

namespace BackEndBundle\Controller;
use BackEndBundle\Entity\idioma;
use BackEndBundle\Entity\catgramatical;
use BackEndBundle\Entity\catfamilia;
use BackEndBundle\Entity\Paraula;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BackEndBundle:Default:index.html.twig');
    }

    #ESBORRAR USUARI
    public function deleteAction($id){
        $usuari = $this->getDoctrine()->getRepository('BackEndBundle:User')->findOneById($id);
        echo $usuari;
        if ($usuari != null) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($usuari);
            $em->flush();
        $this->get('session')->getFlashbag()->add(
                'notice',array (
                    'type' =>'success',
                    'msg' => 'S\'ha eliminat l\'usuari'
                    ));
        }else{
            $this->get('session')->getFlashbag()->add(
                'notice',array (
                    'type' =>'success',
                    'msg' => 'No s\'ha eliminat l\'usuari'
                    ));
        }
        $arrayUsuari = $this->getDoctrine()->getRepository('BackEndBundle:User')->findAll();
        return $this->render('BackEndBundle:Default:llistaUsuaris.html.twig',array(
            'array'=>$arrayUsuari
            ));
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

    public function llistaParaulaAction()
    {
        $llista = $this->getDoctrine()->getRepository('BackEndBundle:Paraula')->findAll();

        return $this->render('BackEndBundle:Default:llistaParaula.html.twig', array(
            'titol' => 'Diccionari de Paraules',
            'paraula' => $llista));
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


    #AFEGIR PARAULA
    public function afegirParaulaAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $paraula=$request->request->get('paraula');

        $idCategoriaGramatical=$request->request->get('categoriagramatical');
        $categoriagramatical = $em->getRepository('BackEndBundle:Paraula')->findOneById($idCategoriaGramatical);
        $idCategoriaFamilia=$request->request->get('categoriafamilia');
        $categoriafamilia = $em->getRepository('BackEndBundle:Paraula')->findOneById($idCategoriaFamilia);

        $definicio=$request->request->get('definicio');

        $Paraula = new Paraula();
        $Paraula->setParaula($paraula);

        $Paraula->setCatgramatical($categoriagramatical);
        $Paraula->getCatgramatical($categoriagramatical);
        $Paraula->setCatfamilia($categoriafamilia);
        $Paraula->getCatfamilia($categoriafamilia);

        $Paraula->setDefinicio($definicio);

        $em->persist($Paraula);
        $em->flush();

        return $this->forward('BackEndBundle:Default:llistaParaula');
    }

    public function formAfegirParaulaAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $paraula = "";
        
        $catgramatical = $em->getRepository('BackEndBundle:catgramatical')->findAll();
        $categoriagramatical = "";
        $catfamilia = $em->getRepository('BackEndBundle:catfamilia')->findAll();
        $categoriafamilia = "";

        $definicio="";

    
        return $this->render('BackEndBundle:Default:paraula.html.twig', array(
            'paraula' => $paraula,

            'catgramatical' => $catgramatical,
            'categoriagramatical' => $categoriagramatical,

            'catfamilia' => $catfamilia,
            'categoriafamilia' => $categoriafamilia,

            'definicio' => $definicio
            )
        );
    }

    #EDITAR PARAULA
    public function editarParaulaAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $Paraula =$em->getRepository('BackEndBundle:Paraula')->findOneById($id);
        
        $paraula=$request->request->get('paraula');
        $idCategoriaGramatical=$request->request->get('categoriagramatical');
        $idCategoriaFamilia=$request->request->get('categoriafamilia');
        $definicio=$request->request->get('definicio');        
        $categoriagramatical = $em->getRepository('BackEndBundle:Paraula')->findOneById($idCategoriaGramatical);
        $categoriafamilia = $em->getRepository('BackEndBundle:Paraula')->findOneById($idCategoriaFamilia);

        $Paraula->setParaula($paraula);
        $Paraula->setCatgramatical($categoriagramatical);
        $Paraula->setCatfamilia($categoriafamilia);
        $Paraula->setDefinicio($definicio);

        $em->persist($Paraula);
        $em->flush();

        return $this->forward('BackEndBundle:Default:llistaParaula');
        
    }

    public function formEditarParaulaAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $Paraula =$this->getDoctrine()->getRepository('BackEndBundle:Paraula')->findOneById($id);
        $paraula=$Paraula->getParaula();
        $idCategoriaGramatical=$Paraula->getCatgramatical()->getId();
        $categoriagramatical = $em->getRepository('BackEndBundle:catgramatical')->findAll();
        $idCategoriaFamilia=$Paraula->getCatfamilia()->getId();
        $categoriafamilia = $em->getRepository('BackEndBundle:catfamilia')->findAll();
        $definicio=$Paraula->getDefinicio();

        return $this->render('BackEndBundle:Default:paraulaEditar.html.twig', array(
            'id' => $id,
            'paraula' => $paraula,
            'idCategoriaGramatical' => $idCategoriaGramatical,
            'categoriagramatical' => $categoriagramatical,
            'idCategoriaFamilia' => $idCategoriaFamilia,
            'categoriafamilia' => $categoriafamilia,
            'definicio' => $definicio
            )
        );
        
    } 

    #ESBORRAR PARAULA
    public function esborrarParaulaAction($id)
    {
        $Paraula =$this->getDoctrine()->getRepository('BackEndBundle:Paraula')->findOneById($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($Paraula);
        $em->flush();
        return $this->forward('BackEndBundle:Default:llistaParaula');
    }

}
