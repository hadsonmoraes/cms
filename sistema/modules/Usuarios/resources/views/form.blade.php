<div class="row g-3">
    <div class="col-md-6"><label for="name" class="form-label">Nome</label><input id="name" name="name"
            class="form-control" value="{{ old('name', $user->name ?? '') }}" required>
        @error('name')
            <div class="text-danger small">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6"><label for="email" class="form-label">E-mail</label><input id="email" name="email"
            type="email" class="form-control" value="{{ old('email', $user->email ?? '') }}" required>
        @error('email')
            <div class="text-danger small">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6"><label for="password" class="form-label">Senha</label><input id="password" name="password"
            type="password" class="form-control" {{ isset($user) ? '' : 'required' }} autocomplete="new-password">
        @if (isset($user))
            <div class="form-text">Deixe em branco para manter a senha atual.</div>
        @endif @error('password')
        <div class="text-danger small">{{ $message }}</div>
    @enderror
</div>
<div class="col-md-6"><label for="password_confirmation" class="form-label">Repetir senha</label><input
        id="password_confirmation" name="password_confirmation" type="password" class="form-control"
        {{ isset($user) ? '' : 'required' }} autocomplete="new-password"></div>
<div class="col-md-6"><label for="role" class="form-label">Perfil</label><select id="role" name="role"
        class="form-select" required>
        <option value="user" @selected(old('role', $user->role ?? 'user') === 'user')>Usuário</option>
        <option value="admin" @selected(old('role', $user->role ?? '') === 'admin')>Administrador</option>
    </select></div>
<div class="col-md-6"><label for="status" class="form-label">Status</label><select id="status" name="status"
        class="form-select" required>
        <option value="active" @selected(old('status', $user->status ?? 'active') === 'active')>Ativo</option>
        <option value="inactive" @selected(old('status', $user->status ?? '') === 'inactive')>Inativo</option>
    </select></div>
<div class="col-12">
    <fieldset>
        <legend class="form-label fs-6">Módulos com acesso</legend>
        <div class="row g-2">
            @foreach ($modules as $module)
                <div class="col-sm-6 col-lg-4">
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="modules[]"
                            value="{{ $module }}" id="module-{{ $module }}"
                            @checked(in_array($module, old('modules', isset($user) ? $user->moduleAccesses->pluck('module')->all() : []), true))><label class="form-check-label"
                            for="module-{{ $module }}">{{ $module }}</label></div>
                </div>
            @endforeach
        </div>
    </fieldset>
</div>
<div class="col-12"><button class="btn btn-primary" type="submit">Salvar usuário</button><a
        href="{{ route('Sistema.Usuarios.index') }}" class="btn btn-link">Cancelar</a></div>
</div>
