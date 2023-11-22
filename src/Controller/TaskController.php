<?php

namespace App\Controller;

use App\Entity\Task;
use App\Repository\TaskRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TaskController extends AbstractController
{
    public function __construct(private TaskRepository $taskRepository){}
    #[Route('/task', name: 'app_tasks')]
    public function index(): Response
    {
        return $this->render('task/index.html.twig', [
            'tasks' => $this->taskRepository->findBy([], ['id' => 'DESC'])
        ]);
    }

    #[Route('/create', name: 'create_task', methods: ['POST'])]
    public function create(Request $request): Response
    {
        $taskName = $request->getPayload()->get('name');
        $task = new Task();
        $task->setName($taskName);
        $task->setCompleted(false);
        $task->setLastModified((new \DateTime()));
        $this->taskRepository->save($task);
        return $this->redirectToRoute('app_tasks');
    }

    #[Route('/toggle/{id}', 'toggle', methods: ['POST'])]
    public function toggle($id): Response
    {
        $task = $this->taskRepository->find($id);
        $task->setCompleted(!$task->isCompleted());
        $this->taskRepository->save($task);
        return $this->redirectToRoute('app_tasks');
    }

    #[Route('/delete/{id}', 'delete', methods: ['POST'])]
    public function delete($id): Response
    {
        $task = $this->taskRepository->find($id);
        $this->taskRepository->delete($task);
        return $this->redirectToRoute('app_tasks');
    }

    #[Route('/edit/{id}', 'edit', methods: ['POST'])]
    public function edit($id): Response
    {
        $task = $this->taskRepository->find($id);
        dd($task);
        return $this->redirectToRoute('app_tasks');
    }
}
