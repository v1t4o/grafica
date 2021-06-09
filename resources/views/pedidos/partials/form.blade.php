<div class="card">
            <div class="card-header"><b>Novo Pedido</b></div>
            <div class="card-body">
                <div class="form-group">
                    <input type="text" hidden class="form-control" name="user_id" value=""><br>
                    <label for="descricao"><b>Descrição:</b></label>
                    <textarea class="form-control" name="descricao" id="descricao" rows="5">{{ old('descricao', $pedido->descricao) }}</textarea>
                </div>              
                <div class="form-group">
                    <label for="tipo" class="required"><b>Tipo:</b></label>
                    <select class="form-control" name="tipo">
                        <option value="" selected="">- Selecione -</option>
                        @foreach ($pedido->tipoOptions() as $option)
                            {{-- 1. Situação em que não houve tentativa de submissão e é uma edição --}}
                            @if (old('tipo') == '' and isset($pedido->tipo))
                            <option value="{{$option}}" {{ ( $pedido->tipo == $option) ? 'selected' : ''}}>
                                {{$option}}
                            </option>
                            {{-- 2. Situação em que houve tentativa de submissão, o valor de old prevalece --}}
                            @else
                            <option value="{{$option}}" {{ ( old('tipo') == $option) ? 'selected' : ''}}>
                                {{$option}}
                            </option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="paginas"><b>Número de páginas:</b></label>
                    <input type="text" class="form-control paginas" name="paginas" value="{{ old('paginas', $pedido->paginas) }}">
                </div>
                <div class="form-group">
                    <label for="centro_de_despesa"><b>Centro de Despesa:</b></label>
                    <textarea class="form-control" name="centro_de_despesa" id="centro_de_despesa" rows="5">{{ old('centro_de_despesa', $pedido->centro_de_despesa) }}</textarea>
                </div>
                <div class="form-group">
                    <label for="autorizador_codpes"><b>Autorizador:</b></label>
                    <input type="text" class="form-control" id="autorizador_codpes" name="autorizador_codpes" value="{{ old('autorizador_codpes', $pedido->autorizador_codpes) }}">
                    <div id="info"></div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success float-right">Enviar</button> 
                </div>
            </div>
        </div>
        