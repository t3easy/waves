<?php
namespace T3easy\Waves\Task;

use TYPO3\Surf\Domain\Model\Application;
use TYPO3\Surf\Domain\Model\Deployment;
use TYPO3\Surf\Domain\Model\Node;
use TYPO3\Surf\Domain\Model\Task;
use TYPO3\Surf\Domain\Service\ShellCommandServiceAwareInterface;
use TYPO3\Surf\Domain\Service\ShellCommandServiceAwareTrait;

class KillPhpTask extends Task implements ShellCommandServiceAwareInterface
{
    use ShellCommandServiceAwareTrait;

    /**
     * Executes this action
     *
     * @param \TYPO3\Surf\Domain\Model\Node $node
     * @param \TYPO3\Surf\Domain\Model\Application $application
     * @param \TYPO3\Surf\Domain\Model\Deployment $deployment
     * @param array $options
     * @return void
     */
    public function execute(Node $node, Application $application, Deployment $deployment, array $options = [])
    {
        $command = 'killall -q php-cgi';
        $this->shell->executeOrSimulate($command, $node, $deployment, true);
    }
}
