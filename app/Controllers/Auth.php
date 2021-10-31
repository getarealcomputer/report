<?php 

namespace App\Controllers;

class Auth extends \IonAuth\Controllers\Auth
{
	/**
	 * Views folder
	 * Set it to 'auth' if your views files are in the standard application/Views/auth
	 *
	 * @var string
	 */
	protected $viewsFolder = 'auth';

  public function index()
  {
    if (!$this->ionAuth->loggedIn()) {
      return redirect()->to('auth/login');
    } 
    return redirect()->to('dashboard');
  }

  /**
   * Log the user in
   *
   * @return string|\CodeIgniter\HTTP\RedirectResponse
   */
  public function login()
  {
    $this->data['title'] = lang('Auth.login_heading');

    // validate form input
    $this->validation->setRule('identity', str_replace(':', '', lang('Auth.login_identity_label')), 'required');
    $this->validation->setRule('password', str_replace(':', '', lang('Auth.login_password_label')), 'required');

    if ($this->request->getPost() && $this->validation->withRequest($this->request)->run())
    {
      // check to see if the user is logging in
      // check for "remember me"
      $remember = (bool)$this->request->getVar('remember');

      if ($this->ionAuth->login($this->request->getVar('identity'), $this->request->getVar('password'), $remember))
      {
        //if the login is successful
        //redirect them back to the home page
        $this->session->setFlashdata('message', $this->ionAuth->messages());
        return redirect()->to('/dashboard')->withCookies();
      }
      else
      {
        // if the login was un-successful
        // redirect them back to the login page
        $this->session->setFlashdata('message', $this->ionAuth->errors($this->validationListTemplate));
        // use redirects instead of loading views for compatibility with MY_Controller libraries
        return redirect()->back()->withInput();
      }
    }
    else
    {
      // the user is not logging in so display the login page
      // set the flash data error message if there is one
      $this->data['message'] = $this->validation->getErrors() ? $this->validation->listErrors($this->validationListTemplate) : $this->session->getFlashdata('message');

      $this->data['identity'] = [
        'name'  => 'identity',
        'id'    => 'identity',
        'type'  => 'text',
        'value' => set_value('identity'),
        'class' => 'form-control',
        'placeholder' => 'Email',
      ];

      $this->data['password'] = [
        'name' => 'password',
        'id'   => 'password',
        'type' => 'password',
        'class' => 'form-control',
        'placeholder' => 'Password',
      ];

      return $this->renderPage($this->viewsFolder . DIRECTORY_SEPARATOR . 'login', $this->data);
    }
  }
}
