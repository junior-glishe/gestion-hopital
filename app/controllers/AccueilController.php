<?php
class AccueilController extends Controller {
    public function index(): void {
        $this->render('accueil/accueil', ['titre' => 'MediTrace - Accueil']);
    }
}
