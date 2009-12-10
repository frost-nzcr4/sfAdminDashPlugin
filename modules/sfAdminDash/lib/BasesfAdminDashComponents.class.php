<?php
/**
 * sfAdminDash base components.
 *
 * @package    plugins
 * @subpackage sfAdminDash
 * @author     Ivan Tanev aka Crafty_Shadow @ webworld.bg <vankata.t@gmail.com>
 * @version    SVN: $Id$
 */ 
class BasesfAdminDashComponents extends sfComponents
{

  /**
  * The main navigation component for the sfAdminDash plugin
  */  
  public function executeHeader()
  {
    $this->items      = sfAdminDash::getItems();
    $this->categories = sfAdminDash::getCategories();
       
    if (
          !sfAdminDash::routeExists($this->module_link = $this->getContext()->getModuleName()         , $this->getContext()) &&
          !sfAdminDash::routeExists($this->module_link = $this->getContext()->getModuleName().'/index', $this->getContext())
       )
    {
      // if we cannot sniff the module link, we set it to null and later simply output is as a string in the breadcrumbs
      $this->module_link = null;
    }

    $this->module_link_name = sfAdminDash::getModuleName($this->getContext()); 
    
    if ($this->getContext()->getActionName() != 'index')
    {
      $this->action_link = $this->getContext()->getRouting()->getCurrentInternalUri();
      $this->action_link_name = sfAdminDash::getActionName($this->getContext());
    }
    else
    {
      $this->action_link = null;
    }
  } 

}