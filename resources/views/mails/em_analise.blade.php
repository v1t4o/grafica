@inject('pessoa','Uspdev\Replicado\Pessoa')

{!! $pedido->configMail($pedido, $pessoa::dump($codpes)['nompes'], 'em_analise') !!}