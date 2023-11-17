<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\Imovel;
use Illuminate\Http\Request;
use File;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

use App\Models\Distrito;
use App\Models\Concelho;
use App\Models\Localidade;
use App\Models\CodigoPostal;
use Auth\Auth;
use App\Models\Foto;

class ImovelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$query_localidade = null;
		$localidades = Localidade::select('nome_localidade', 'id')->has('imoveis')->orderBy('nome_localidade', 'ASC')->get();
        $imoveis = Imovel::select('*');
		
		if(isset($_GET["tipo_negocio"]) AND $_GET["tipo_negocio"] != '')
		{
			$imoveis = $imoveis->where('tipo_negocio', '=', $_GET["tipo_negocio"]);
		}
		
		if( isset($_GET["localidade"]) AND $_GET["localidade"] != '')
		{
			$imoveis = $imoveis->where('localidade', '=', $_GET["localidade"]);
			$query_localidade = Localidade::where('id', '=', $_GET["localidade"])->first();
		}
		
		if( isset($_GET["quartos"]) AND $_GET["quartos"] != '')
		{
			$imoveis = $imoveis->where('quartos', '=', $_GET["quartos"]);
		}
				
		
		if( isset($_GET["preco"]) AND $_GET["preco"] != '')
		{
			$imoveis = $imoveis->where('preco', '<', $_GET["preco"]);
		}
					
		$imoveis = $imoveis->orderBy('id', 'desc')->paginate(15);




        return view('imoveis.index', compact('imoveis', 'localidades', 'query_localidade'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $distritos = Distrito::pluck('id','nome_distrito');
		$concelhos = Concelho::orderBy('nome_concelho', 'ASC')->get();
		$localidades = Localidade::orderBy('nome_localidade', 'ASC')->get();

		return view('imoveis.criar', compact('distritos', 'concelhos', 'localidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
			'required' => 'O campo :attribute é mandatório.',
		];
		
		if(($request->natureza == "Propriedade agrícola") OR ($request->natureza == "Terreno urbanizável"))
		{
			$estado = [''];
		} else {
			$estado = ['required', 'string'];
		}
		

		$validator = Validator::make($request->all(), [
            'tipo_negocio' => ['required', 'string', 'max:255'],
            'natureza' => ['required', 'string'],
			'estado' => $estado,
			'distrito' => ['required', 'string'],
			'concelho' => ['required', 'string'],
			'localidade' => ['required', 'string'],
			'fotos.*' => ['image']
        ], $messages);

        if ($validator->fails()) {
            return redirect('imoveis/create')
                ->withErrors($validator)
				->withInput();
        }
		
		$imovel = new Imovel;
		$imovel->tipo_negocio = $request->tipo_negocio;
		$imovel->natureza = $request->natureza;
		$imovel->tipologia = $request->tipologia;
		$imovel->estado = $request->estado;
		$imovel->area_util = $request->area_util;
		$imovel->area_bruta = $request->area_bruta;
		$imovel->area_terreno = $request->area_terreno;
		$imovel->distrito = $request->distrito;
		$imovel->concelho = $request->concelho;
		$imovel->localidade = $request->localidade;
		$imovel->codigo_postal = $request->codigo_postal;
		$imovel->rua = $request->rua;
		$imovel->ano_construcao = $request->ano_construcao;
		$imovel->categoria_energetica = $request->categoria_energetica;
		$imovel->referencia = $request->referencia;
		$imovel->wc = $request->wc;
		$imovel->quartos = $request->quartos;
		$imovel->garagem = $request->garagem;
		$imovel->preco = $request->preco;
		$imovel->descricao = $request->descricao;
		
		$imovel->save();
		
		if ($request->hasFile('fotos'))
		{
			ini_set('memory_limit','1024M'); 
			$destination = 'fotos_imoveis/';
			
			if($files=$request->file('fotos')){
				foreach($files as $file){
					$filename= $imovel->id .'-'. $file->getClientOriginalName();
					
					$imgInfo = getimagesize($file); 
					$mime = $imgInfo['mime']; 
					
					if ($imgInfo['mime'] == 'image/jpeg') {
						$image = imagecreatefromjpeg($file);

					} elseif ($imgInfo['mime'] == 'image/gif') {
						$image = imagecreatefromgif($file);

					}elseif ($imgInfo['mime'] == 'image/png') {
						$image = imagecreatefrompng($file);
					}
					
					imagejpeg($image, $destination.$filename, 60);
					
					// Create a new image from file 
					// switch($mime){ 
						// case 'image/jpeg': 
							// $image = imagecreatefromjpeg($file); 
							// imagejpeg($image, $destination.$filename, 60);
							// break; 
						// case 'image/png': 
							// $image = imagecreatefrompng($file); 
							// imagepng($image, $destination.$filename, 60);
							// break; 
						// case 'image/gif': 
							// $image = imagecreatefromgif($file); 
							// imagegif($image, $destination.$filename, 60);
							// break; 
						// default: 
							// $image = imagecreatefromjpeg($file); 
						   
					// } 
					
					//$file->move($destinationPath, $filename);
					
					$foto = new Foto;
					$foto->id_imovel = $imovel->id;
					$foto->filename = $filename;
					$foto->save();
				}
			}
		}
		
        return redirect('imoveis')->with('modal-success','O imóvel foi criado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Imovel  $imovel
     * @return \Illuminate\Http\Response
     */
    public function show(Imovel $imovel)
    {
		$title = $imovel->natureza." ".$imovel->tipologia. " em ". $imovel->ref_localidade->nome_localidade;		
		$description = $imovel->description;
		
        return view('imoveis.ver', compact('imovel', 'title', 'description'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Imovel $imovel
     * @return \Illuminate\Http\Response
     */
    public function edit(Imovel $imovel)
    {
		//$imovel = Imovel::where('id', '=', $id)->first();
        $distritos = Distrito::pluck('id','nome_distrito');
		$concelhos = Concelho::orderBy('nome_concelho', 'ASC')->get();
		$localidades = Localidade::orderBy('nome_localidade', 'ASC')->get();
		$title = $imovel->natureza." ".$imovel->tipologia. " em ". $imovel->ref_localidade->nome_localidade;
	
		return view('imoveis.editar', compact('imovel', 'distritos', 'concelhos', 'localidades', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Imovel $imovel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Imovel $imovel)
    {
        $messages = [
			'required' => 'O campo :attribute é mandatório.',
		];
		
		if(($request->natureza == "Propriedade agrícola") OR ($request->natureza == "Terreno urbanizável"))
		{
			$estado = [''];
		} else {
			$estado = ['required', 'string'];
		}
		
		

		$validator = Validator::make($request->all(), [
            'tipo_negocio' => ['required', 'string', 'max:255'],
            'natureza' => ['required', 'string'],
			'estado' => $estado,
			'distrito' => ['required', 'string'],
			'concelho' => ['required', 'string'],
			'localidade' => ['required', 'string']
        ], $messages);

        if ($validator->fails()) {
			
            return redirect('imoveis/'.$id.'/edit')
                ->withErrors($validator)
				->withInput();
        }
		
		//$imovel = Imovel::where('id', '=', $id)->first();
        $imovel->tipo_negocio = $request->tipo_negocio;
		$imovel->natureza = $request->natureza;
		$imovel->tipologia = $request->tipologia;
		$imovel->estado = $request->estado;
		$imovel->area_util = $request->area_util;
		$imovel->area_bruta = $request->area_bruta;
		$imovel->area_terreno = $request->area_terreno;
		$imovel->distrito = $request->distrito;
		$imovel->concelho = $request->concelho;
		$imovel->localidade = $request->localidade;
		$imovel->codigo_postal = $request->codigo_postal;
		$imovel->rua = $request->rua;
		$imovel->ano_construcao = $request->ano_construcao;
		$imovel->categoria_energetica = $request->categoria_energetica;
		$imovel->referencia = $request->referencia;
		$imovel->wc = $request->wc;
		$imovel->quartos = $request->quartos;
		$imovel->garagem = $request->garagem;
		$imovel->preco = $request->preco;
		$imovel->descricao = $request->descricao;
		
		$imovel->save();
	
		if ($request->hasFile('fotos'))
		{
			
			$destination = 'fotos_imoveis/';
			ini_set('memory_limit','1024M'); 
			
			if($files=$request->file('fotos')){
				foreach($files as $file){
					$filename= $imovel->id .'-'. $file->getClientOriginalName();
					
					$imgInfo = getimagesize($file); 
					$mime = $imgInfo['mime']; 
					
					if ($imgInfo['mime'] == 'image/jpeg') {
						$image = imagecreatefromjpeg($file);

					} elseif ($imgInfo['mime'] == 'image/gif') {
						$image = imagecreatefromgif($file);

					}elseif ($imgInfo['mime'] == 'image/png') {
						$image = imagecreatefrompng($file);
					}
					
					imagejpeg($image, $destination.$filename, 60);
					
					//$file->move($destinationPath, $filename);
					
					$foto = new Foto;
					$foto->id_imovel = $imovel->id;
					$foto->filename = $filename;
					$foto->save();
				}
			}
		}		
		
		if ($request->apagar_imagem)
		{
			
			foreach($request->apagar_imagem as $id_apagar)
			{
				$foto = Foto::where('id', '=', $id_apagar)->first();
				$foto->delete();
			}
		}
		
		return back()->withInput()->with('success', 'As alterações ao imóvel foram guardadas.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $imovel = Imovel::where('id', '=', $id)->first(); 
		$fotos = $imovel->fotos;
		
		
		
		$destinationPath = 'fotos_imoveis/';

		foreach($fotos as $foto)
		{
			unlink($destinationPath. $foto->filename);
			$foto->delete();			
		}
		
		$imovel->delete();
		
		return redirect('imoveis')->with('modal-delete','O imóvel foi removido.');
    }

	public function enviar_contacto(Request $request)
    {

		$this->validate($request, [
				'nome' => 'required',
				'email' => 'required|email',
				'mensagem' => 'required'
			]);
			
		$data = array(
            'nome' => $request->nome,
            'mensagem' => $request->mensagem,
			'email' => $request->email,
			'assunto' => "mensagem website",
			//'endereco_imovel' => $request->endereco_imovel
        );	
		
		Mail::to('jmletras@gmail.com')->send(new ContactMail($data));

			   
			
		return back()->with('success', 'Obrigado pelo seu contacto. Entraremos em contacto consigo o mais rápido possível.');
	}
}
