<?php

class FaleConoscoController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    function indexAction() {
        $this->view->title = 'Fale Conosco';

        $this->view->description = '';
        $this->view->keywords = '';
        $this->view->headScript()
                ->appendFile('/js/jquery.maskedinput-1.2.2.min.js')
                ->appendFile('/js/faleconosco.js')
        ;
        $this->view->headLink()->appendStylesheet('/css/faleconosco.css');
        $form = new form_FaleConosco();
        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {

                $nome = $this->_request->nome;
                $email = $this->_request->email;

                $mail = new Email($nome, $email);

                $this->view->conteudo = $this->_request->getPost();
                $body = $this->view->render('emails/contato.phtml');

                $mail->MsgHTML($body);
                $mail->Subject = 'Contato enviado pelo site armazemdosorganicos.com.br';

                if (!$mail->Send()) {
                    $this->_helper->FlashMessenger(array('error' => 'Erro ao enviar o e-mail - ' . $mail->ErrorInfo));
                } else {
                    $this->_helper->FlashMessenger(array('sucess' => 'E-mail enviado com sucesso!'));
                    $form->reset();
                    $this->_redirect('fale-conosco');
                }
            } else {
                $this->_helper->FlashMessenger(array('error' => 'Preencha todos os campos obrigatÃ³rios!'));
                $form->populate($this->_request->getPost())->markAsError();
            }
        }
        $this->view->form = $form;
    }

}

