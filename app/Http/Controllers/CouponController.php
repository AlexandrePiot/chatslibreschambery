<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DiscountFormRequest;
use Illuminate\Support\Facades\DB;
use App\Liasse;
use App\Discount;
use App\Fournisseur;
use App\Coupon;

class CouponController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /* --------------------------------------------------- LIASSES --------------------------------------------------- */

    // Par samuel et théo le 03/05/2018
    // Retrouve le coupon par son id (si il existe)
    //  L'ajoute si il n'existe pas et que les champs ne sont pas remplis
    //  Le modifie si des champs ont été remplis ou modifiés
    //  Sinon on affiche la page d'ajout d'une nouvelle liasse
    public function modifyCoupon(Request $request, $id)
    {
        $message = '';
        $coupon = Coupon::find($id);

        // Modification du coupon

        if ($coupon != NULL){
            if ( $request->input('referentName') != NULL){
                $coupon->referentName = $request->input('referentName');
                $message = 'Le nom du référent a bien été modifiée.';
            }
            if ($request->input('referentPhone') != NULL){
                $coupon->referentPhone = $request->input('referentPhone');
                $message = 'le numéro de téléphone du responsable a bien été modifiée.';
            }
            if ($request->input('benevoleName') != NULL){
                $coupon->benevoleName = $request->input('benevoleName');
                $message = 'le nom du bénévole a bien été modifiée.';
            }
            if ($request->input('benevolePhone') != NULL){
                $coupon->benevolePhone = $request->input('benevolePhone');
                $message = 'le numéro de téléphone du bénévole a bien été modifiée.';
            }
            if ($request->input('dateExpiration') != NULL){
                $coupon->dateExpiration = $request->input('dateExpiration');
                $message = 'le numéro de téléphone du bénévole a bien été modifiée.';
            }

            $coupon->save();
            $coupon = Coupon::find($id);

        // Ajout du coupon
        } elseif ($request->input('referentName') != NULL) {
            $coupon = new Coupon();
            $coupon->referentName = $request->input('referentName');


            if ($request->input('referentPhone') != NULL){
                $coupon->referentPhone = $request->input('referentPhone');
            }
            if ($request->input('benevoleName') != NULL){
                $coupon->benevoleName = $request->input('benevoleName');
            }
            if ($request->input('benevolePhone') != NULL){
                $coupon->benevolePhone = $request->input('benevolePhone');
            }
            if ($request->input('dateExpiration') != NULL){
                $coupon->dateExpiration = $request->input('dateExpiration');
            }
            $coupon->save();
            $coupon->refCoupon = date("Y")."-".$coupon->id;
            $coupon->save();
            $coupon = Coupon::find($coupon->id);
            $message = 'Le coupon a bien été ajoutée.';

        // Affiche la page de création du coupon
        } else {
            $coupon = new Coupon();
            $coupon->id = 0;
        }
        return view('compta.coupon',
            ['coupon'=>$coupon,
            'message'=>$message]);
    }

    // Par samuel et théo le 03/05/2018
    // Affiche la liste de touts les coupons
    public function manageCoupon(Request $request)
    {
        return view('compta.listCoupon',['coupons'=>Coupon::getAllCoupons()]);
    }

    // Par samuel et théo le 03/05/2018
    // Supprime le coupon et update la vue
    public function deleteCoupon($id)
    {
        Coupon::destroy($id);
        return view('compta.listCoupon',['coupons'=>Coupon::getAllCoupons()]);
    }
}
