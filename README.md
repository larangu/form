**LARANGU** presents

# FORM-NG

### The ultimate laravel's bundel for Angular 2 Forms. 

**Instalation**

Tn the `config/app.php` file in the providers array add:
 
     \Larangu\FormNg\FormNgServiceProvider::class,
     
and if you want to use you can register `FormNg` alias into the alias's array:

    'FormNg' => \Larangu\FormNg\Facades\FormNgFacade::class,