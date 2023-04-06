<?php

declare(strict_types=1);

namespace App\Controller;

use Linio\DynamicFormBundle\DynamicFormAware;
use Linio\DynamicFormBundle\Form\FormFactory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormRegistryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class TestController extends AbstractController
{
    use DynamicFormAware;

    public function __construct(
        private FormFactory $formFactory,
        private FormRegistryInterface $formRegistry,
        private Environment $twig
    )
    {
    }

    /**
     * @Route("/test")
     * @param Request $request
     */
    public function test(Request $request)
    {
        dd($this->formRegistry);
        $this->setDynamicFormFactory($this->formFactory);

        $form = $this->getDynamicFormFactory()->createForm('test_new_user');

        return new Response(
            $this->twig->render('test.html.twig', [
                    'form' => $form->createView(),
                ]
            )
        );
    }
}