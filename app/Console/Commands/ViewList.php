<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Helper\TreeNode;
use Symfony\Component\Console\Helper\TreeHelper;


class ViewList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'view:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'View list-tree';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $path = resource_path('views');

        $root = $this->buildNode($path, 'views');

        TreeHelper::createTree($this->output, $root)->render();

        return self::SUCCESS;
    }

    protected function buildNode(string $path, ?string $label = null): TreeNode
    {
        $node = new TreeNode($label ?? basename($path));

        foreach (scandir($path) as $item) {
            if ($item === '.' || $item === '..') {
                continue;
            }

            $full = $path . "/" . $item;

            if (is_dir($full)) {
                $node->addChild($this->buildNode($full));
            } elseif (str_ends_with($item, '.blade.php')) {
                $node->addChild(new TreeNode($item));
            }
        }

        return $node;
    }
}
