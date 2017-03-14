                {!! Form::open(['url'=>'users/password']) !!}
                  <!-- text input -->
                  <div class="form-group{{ $errors->has('current_password') ? ' has-error' : '' }} has-feedback">
                    <label for="current_password">Current Password</label>
                    <input type="password" class="form-control" id="current_password" name="current_password" required placeholder="Current Password" >
                    @if ($errors->has('current_password'))
                      <span class="help-block">
                        <strong>{{ $errors->first('current_password') }}</strong>
                      </span>
                    @endif
                  </div>
                  <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }} has-feedback">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required minlength="6" >
                    @if ($errors->has('password_confirmation'))
                      <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                      </span>
                    @endif
                  </div>
                  <div class="form-group has-feedback">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required>
                  </div>
                  <div class="form-group">
                    <button name="change-pass-but" id="change-pass" class="btn btn-block btn-info">CHANGE</button>
                  </div>

                {!! Form::close() !!}