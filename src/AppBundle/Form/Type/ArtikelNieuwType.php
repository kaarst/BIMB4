<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

//vul aan als je andere invoerveld-typen wilt gebruiken in je formulier
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

//EntiteitType vervangen door b.v. KlantType
class ArtikelNieuwType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
		//gebruiken wat je nodig hebt, de id hoeft er niet bij als deze auto increment is
        $builder
        ->add('Artikelnummer', TextType::class) //naam is b.v. een attribuut of variabele van klant
        ;
				$builder
            ->add('Omschrijving', TextType::class) //naam is b.v. een attribuut of variabele van klant
        ;
				$builder
            ->add('TechnischeSpecificaties', TextType::class) //naam is b.v. een attribuut of variabele van klant
        ;
        $builder
            ->add('Magazijnlocatie', TextType::class) //naam is b.v. een attribuut of variabele van klant
        ;
				$builder
            ->add('Inkoopprijs', MoneyType::class) //naam is b.v. een attribuut of variabele van klant
        ;
				$builder
            ->add('CodeVervangendArtikel', TextType::class) //naam is b.v. een attribuut of variabele van klant
        ;
				$builder
            ->add('MinimumVoorraad', TextType::class) //naam is b.v. een attribuut of variabele van klant
        ;
				$builder
            ->add('AantalVoorraad', TextType::class) //naam is b.v. een attribuut of variabele van klant
        ;
		//zie
		//http://symfony.com/doc/current/forms.html#built-in-field-types
		//voor meer typen invoer
    }

	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults(array(
			'data_class' => 'AppBundle\Entity\Artikel', //Entiteit vervangen door b.v. Klant
		));
	}
}

?>
