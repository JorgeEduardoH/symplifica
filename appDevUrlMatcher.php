<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_info
                if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            // _twig_error_test
            if (0 === strpos($pathinfo, '/_error') && preg_match('#^/_error/(?P<code>\\d+)(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_twig_error_test')), array (  '_controller' => 'twig.controller.preview_error:previewErrorPageAction',  '_format' => 'html',));
            }

        }

        // homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'homepage');
            }

            return array (  '_controller' => 'AppBundle\\Controller\\DefaultController::indexAction',  '_route' => 'homepage',);
        }

        if (0 === strpos($pathinfo, '/empleado')) {
            // empleado_index
            if (rtrim($pathinfo, '/') === '/empleado') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_empleado_index;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'empleado_index');
                }

                return array (  '_controller' => 'AppBundle\\Controller\\EmpleadoController::indexAction',  '_route' => 'empleado_index',);
            }
            not_empleado_index:

            // empleado_new
            if ($pathinfo === '/empleado/new') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_empleado_new;
                }

                return array (  '_controller' => 'AppBundle\\Controller\\EmpleadoController::newAction',  '_route' => 'empleado_new',);
            }
            not_empleado_new:

            // empleado_show
            if (preg_match('#^/empleado/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_empleado_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'empleado_show')), array (  '_controller' => 'AppBundle\\Controller\\EmpleadoController::showAction',));
            }
            not_empleado_show:

            // empleado_edit
            if (preg_match('#^/empleado/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_empleado_edit;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'empleado_edit')), array (  '_controller' => 'AppBundle\\Controller\\EmpleadoController::editAction',));
            }
            not_empleado_edit:

            // empleado_delete
            if (preg_match('#^/empleado/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_empleado_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'empleado_delete')), array (  '_controller' => 'AppBundle\\Controller\\EmpleadoController::deleteAction',));
            }
            not_empleado_delete:

            if (0 === strpos($pathinfo, '/empleador')) {
                // empleador_index
                if (rtrim($pathinfo, '/') === '/empleador') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_empleador_index;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'empleador_index');
                    }

                    return array (  '_controller' => 'AppBundle\\Controller\\EmpleadorController::indexAction',  '_route' => 'empleador_index',);
                }
                not_empleador_index:

                // empleador_new
                if ($pathinfo === '/empleador/new') {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_empleador_new;
                    }

                    return array (  '_controller' => 'AppBundle\\Controller\\EmpleadorController::newAction',  '_route' => 'empleador_new',);
                }
                not_empleador_new:

                // empleador_show
                if (preg_match('#^/empleador/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_empleador_show;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'empleador_show')), array (  '_controller' => 'AppBundle\\Controller\\EmpleadorController::showAction',));
                }
                not_empleador_show:

                // empleador_edit
                if (preg_match('#^/empleador/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_empleador_edit;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'empleador_edit')), array (  '_controller' => 'AppBundle\\Controller\\EmpleadorController::editAction',));
                }
                not_empleador_edit:

                // empleador_delete
                if (preg_match('#^/empleador/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_empleador_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'empleador_delete')), array (  '_controller' => 'AppBundle\\Controller\\EmpleadorController::deleteAction',));
                }
                not_empleador_delete:

            }

        }

        // app_lucky_number
        if ($pathinfo === '/lucky/number') {
            return array (  '_controller' => 'AppBundle\\Controller\\LuckyController::numberAction',  '_route' => 'app_lucky_number',);
        }

        // reporte_admin
        if ($pathinfo === '/reporte/admin') {
            return array (  '_controller' => 'AppBundle\\Controller\\ReporteController::adminAction',  '_route' => 'reporte_admin',);
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
