<?php

namespace PageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class PageController extends Controller
{

    public function listAction()
    {
        $pageRepository = $this->getDoctrine()->getRepository('PageBundle:Page');
        $pages = $pageRepository->findAll();
        return $this->render('@Page/Page/list.html.twig', [
            'pages' => $pages
        ]);
    }

    public function viewAction($id)
    {
        $pageRepository = $this->getDoctrine()->getRepository('PageBundle:Page');
        $page = $pageRepository->find($id);
        if(!$page){
            throw $this->createNotFoundException('This not page');
        }
        return $this->render('@Page/Page/view.html.twig', [
            'page' => $page
        ]);
    }
}
