<?php

namespace App\Compressor\Infrastructure\Twig\Component\Live;

use App\Compressor\Infrastructure\Form\MediaCompressorType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\ComponentWithFormTrait;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent]
class MediaCompressorForm extends AbstractController
{
    use DefaultActionTrait;
    use ComponentWithFormTrait;

    #[LiveAction]
    public function save(Request $request, MessageBusInterface $eventBus): RedirectResponse
    {
        $this->submitForm();

        $form = $this->getForm();

        $command = $form->get('command')->getData();

        // TODO: Don't know why, but it's an empty array
        $medias = $request->files->all('media');

        // TODO: current dispatch
        //        $this->eventBus->dispatch(new CopyMedia($command, $files));

        $parameters = [];
        return $this->redirectToRoute('app_compressor_index', $parameters);
    }

    protected function instantiateForm(): FormInterface
    {
        return $this->createForm(MediaCompressorType::class);
    }
}
