<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class PartnershipAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('project', null, array(
                'placeholder' => '-- please choose a project --'
            ))
            ->add('partner', null, array(
                'placeholder' => '-- please choose an organisation --'
            ))
            ->add('startDate', DateType::class, array(
                'widget' => 'single_text'
            ))
            ->add('endDate', DateType::class, array(
                'widget' => 'single_text'
            ))
            ->add('contact', null, array(
                'label' => 'Contact person(s)'
            ))
            ->add('partnershipType', null, array(
                'placeholder' => '-- please choose a partnership type --'
            ))
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('project')
            ->add('partner')
            ->add('startDate')
            ->add('endDate')
            ->add('contact')
            ->add('partnershipType')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('id')
            ->add('project')
            ->add('partner')
            ->add('startDate')
            ->add('endDate')
            ->add('contact')
            ->add('partnershipType')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                )
            ))
        ;
    }

    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('project')
            ->add('partner')
            ->add('startDate')
            ->add('endDate')
            ->add('contact')
            ->add('partnershipType')
        ;
    }
}