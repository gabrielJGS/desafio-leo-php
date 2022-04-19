<?php

function printMessage($message)
{
    if ($message == 'read-error')
        return '<div class="alert alert-dismissible alert-danger">Ocorreu um erro ao acessar o curso!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    if ($message == 'success-create')
        return '<div class="alert alert-dismissible alert-success">Curso cadastrado com sucesso!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    if ($message == 'error-create')
        return '<div class="alert alert-dismissible alert-danger">Erro ao cadastrar.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    if ($message == 'success-remove')
        return '<div class="alert alert-dismissible alert-success">Curso removido com sucesso!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    if ($message == 'error-remove')
        return '<div class="alert alert-dismissible alert-danger">Erro ao remover registro.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    if ($message == 'success-update')
        return '<div class="alert alert-dismissible alert-success">Curso atualizado com sucesso!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    if ($message == 'error-update')
        return '<div class="alert alert-dismissible alert-danger">Erro ao atualizar curso.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
}
