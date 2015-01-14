<?php
$this->layout = 'panel'
?>
<div class="main-content">

    <p class="highlighted-message">
        Olá, <strong><?php echo $app->user->profile->name ?></strong>, bem-vindo ao painel do <?php echo $app->siteName; ?>!
    </p>
    <section id="user-stats" class="clearfix">
        <div class="box">
            <div class="clearfix">
                <span class="alignleft">Eventos</span>
                <div class="icon icon-event
                    <a href="#">Evento</a> alignright"></div>
            </div>
            <div class="clearfix">
                <a class="user-stats-value hltip" href="<?php echo $app->createUrl('panel', 'events') ?>" title="Ver meus eventos"><?php echo $count->events; ?></a>
                <a class="icon plus alignright hltip" href="<?php echo $app->createUrl('event', 'create'); ?>" title="Adicionar eventos"></a>
            </div>
        </div>
        <div class="box">
            <div class="clearfix">
                <span class="alignleft">Agentes</span>
                <div class="icon profile alignright"></div>
            </div>
            <div class="clearfix">
                <a class="user-stats-value hltip" href="<?php echo $app->createUrl('panel', 'agents') ?>" title="Ver meus agentes"><?php echo $count->agents; ?></a>
                <a class="icon plus alignright hltip" href="<?php echo $app->createUrl('agent', 'create'); ?>" title="Adicionar agentes"></a>
            </div>
        </div>
        <div class="box">
            <div class="clearfix">
                <span class="alignleft">Espaços</span>
                <div class="icon icon-space alignright"></div>
            </div>
            <div class="clearfix">
                <a class="user-stats-value hltip" href="<?php echo $app->createUrl('panel', 'spaces') ?>" title="Ver meus espaços"><?php echo $count->spaces; ?></a>
                <a class="icon plus alignright hltip" href="<?php echo $app->createUrl('space', 'create'); ?>" title="Adicionar espaços"></a>
            </div>
        </div>
        <div class="box">
            <div class="clearfix">
                <span class="alignleft">Projetos</span>
                <div class="icon icon-project alignright"></div>
            </div>
            <div class="clearfix">
                <a class="user-stats-value hltip" href="<?php echo $app->createUrl('panel', 'projects') ?>" title="Ver meus projetos"><?php echo $count->projects; ?></a>
                <a class="icon plus alignright hltip" href="<?php echo $app->createUrl('project', 'create'); ?>" title="Adicionar projetos"></a>
            </div>
        </div>

    </section>
    <?php if($app->user->notifications): ?>
    <section id="atividades">
        <header class="clearfix">
            <h2 class="alignleft">Atividades</h2>
            <div id="status-das-atividades" class="dropdown alignright">
                <div class="placeholder">Pendentes</div>
                <div class="submenu-dropdown">
                    <ul>
                        <li>Pendentes</li>
                        <li>Todas</li>
                    </ul>
                </div>
            </div>
        </header>

        <?php foreach ($app->user->notifications as $notification): ?>
            <div class="atividade clearfix">
                <p>
                    <span class="small">Em <?php echo $notification->createTimestamp->format('d/m/Y - H:i') ?></span><br/>
                    <?php echo $notification->message ?>
                </p>
                <?php if ($notification->request): ?>
                    <div>
                        <?php if($notification->request->canUser('approve')): ?><a class="btn btn-small btn-success" href="<?php echo $notification->approveUrl ?>">aceitar</a><?php endif; ?>
                        <?php if($notification->request->canUser('reject')): ?>
                            <?php if($notification->request->requesterUser->equals($app->user)): ?>
                                <a class="btn btn-small btn-default" href="<?php echo $notification->rejectUrl ?>">cancelar</a>
                                <a class="btn btn-small btn-success" href="<?php echo $notification->deleteUrl ?>">ok</a>
                            <?php else: ?>
                                <a class="btn btn-small btn-danger" href="<?php echo $notification->rejectUrl ?>">rejeitar</a>
                            <?php endif ;?>
                        <?php endif; ?>
                    </div>
                <?php else: ?>
                    <div><a class="btn btn-small btn-success" href="<?php echo $notification->deleteUrl ?>">ok</a></div>
                <?php endif ?>
            </div>
        <?php endforeach; ?>
    </section>
    <?php endif; ?>
</div>
<div class="ficha sidebar-right">

</div>
