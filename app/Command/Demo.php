<?php

declare(strict_types=1);

namespace App\Command;

use App\Core\BaseCommand;
use Hyperf\Command\Annotation\Command;
use Hyperf\Di\Annotation\Inject;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

/**
 * @Command
 */
class Demo extends BaseCommand
{
    /**
     * 执行的命令行
     *
     * @var string
     */
    protected $name = 'demo:command';

    public function configure()
    {
        parent::configure();
        $this->addOption('name', 'n1', InputOption::VALUE_NONE, '这是一个名字的参数缩写');
    }

    public function handle()
    {
        $argument = $this->input->getArgument('name') ?? 'World';
        $this->line('Hello ' . $argument, 'info');
    }

    protected function getArguments()
    {
        return [
            ['name', InputArgument::OPTIONAL, '这是一个名字'],
            ['name2', InputArgument::OPTIONAL, '这是一个备用名字']
        ];
    }
}