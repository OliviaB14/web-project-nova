@extends('layout.dashboard')

@section('css-links')
<style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }
        
        main {
            flex: 1 0 auto;
        }
        
        body {
            background: #fff;
        }
        
        .input-field input[type=date]:focus+label,
        .input-field input[type=text]:focus+label,
        .input-field input[type=email]:focus+label,
        .input-field input[type=password]:focus+label {
            color: #487AA1;
        }
        
        .input-field input[type=date]:focus,
        .input-field input[type=text]:focus,
        .input-field input[type=email]:focus,
        .input-field input[type=password]:focus {
            border-bottom: 2px solid #487AA1;
            box-shadow: none;
        }
    </style>
@endsection

@section('content')


    <div class="section"></div>

<main>
    <div class="container text-center">
        <center>
                <div class="section"></div>
            <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">
                <div class="panel panel-default">
                <h1 style="color:#487AA1">NovaGest</h1>
                    <div class="panel-body">
                    <div>
                        <image class="circle" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGEAAABgCAIAAACCOItRAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAABLNSURBVHhe7Z2JdxtVlsbnD5wMEAIhCTgrIRsBQnoIzDRnGHq6G+iGhjQM3WRox3u8O06chGwmcTbH2hfLq2wttmzJsmRJlm1JYX7Sqwi7VCWV5JKb9Onv3MNxSrfuu++r9+6799XCv/z0T5TCPzkqjS3i6MmTJ5knT9Yy6UR6dSYZNUR83QH7pxP97w5fOmzv3Gdt3WVu2mGs326se95Yt91Y/7KxYbepab+19Yi967Tr8h8mf+wK2IciPs7FAnawBiTrVUbVOUo/yUTXkpOJhYGwu9ZnOOPq229tg4Vthtp/M5yHES2CJvqcxbkfjFyp9Q3dXZh0JxaiqST2q01WtTjC7+X02lg8eHHO+cfJO8cd3a+Ym+jqc5p5URMsYGenqfGEo/tz953eOSet0Fb1mNKfI3yNp1aHIt4/T9076bzIJBId2zw760UYfMFYt9vc/Jbz4tmpe7QYT61UgymdOWLkm6Mzvxu/XWO5wNTQnZpCEU28aKynxd9O3CLSEa0kb3SCPhxx9fCMAPHJxO2XTA3aA42+Qrs7TA2fTPRPJEL4o9eY0oEjvCEk1/uNh2zt2zbBjhgReZH9ql1g6oC1rdY7BFOreoypzXLESnw9OPrByFWGT1kdQ5nOMEd2mZv3Wlvh97ij65Szl2zgbefFo/bOA7b2GusFIj1zFs1yjTOg3h+5ci04kkivSb5Wiso5YiT7k9H/nX5AdvO8IeuWzFFFyU4HYwOMfDh67a+eRz0Bx48LE4RbeywwEp9nPDJhuf6u+LxtafZxxHs7NE5m9O30Qy7DQVs7PdfIl9CB/T9P3cfPzcy7CjkiNluWZk4PX3pBGzuiYySEf/M+NkZ8wZVYMr3GJMWOyAaBZPopxEF+RQdN9OdXYrB5zvPoiL0Tg4islULJ+maoe9vZa4r4sCOZLhOVcLSSSQ2Ep3BU5pBMBHfMpgPW9s8n7w4uemKpFcnEJgBxJKUPFz0k3wdsbYwsLRfpsK2TtDOZTklWykHZHBGALs8NExSLe8avpHnvDPeSEw/H5lbSKfommdADWMOmMzb3vfcx+dHLpsaS/hy0tZFwJlKrkgnNKI8jLmCL3/yqpaWIQ/zE2CHuNvlNE4kFpol0cnUAU6PxYKPfeNLRIzIymT954ac9lhbW38jasnSyNpTBUWQt+Z3n0SumpuJ+vGa5QNAZT4TwXjqz+hBM4V7J68f6+/X0/cVyaNLKEeUF44LpU9yDY45uU9RHwNJ3ZmkBLRLX7y9OszIUd/JlU8N5n4EeSWeWgiaO6DMxiIGq2LY4SCLzhfvu4mp5w7gaCKwsfTrRT4RSy0g4uMfcTNoBp9I5RVGaI5ZMVrFiQdpQ97qtvXXGUtYArirCq4kGvxGf8U3ubU7oC2vinYXJjIaEoARHDGBTxM8yr0YQSQrFPXkg693Wzy814AlT6WZo7ISjW81zjjMrzVF/SbdLcESGSnEgs54Xmjlm77JEZ3Qpi3QHIYKkbL+trUi2Sd4wk4xKJ6igGEcMjW+mH5BJy+wKoeGj9i4KCFJh6YRfHvDNvhQoEig4fnbqPj2VTlCCKkfkNdfmR2osFwqtcwTiTjoumqMzv2SC8ni86KFIVotN9PHqvKtIHqfMEVOUBOeM64qa3cO2DgJetfNDvbCaSd0IjhKkZb3Iy3uuvrF4UC0wKXNE52u9Q2ql0C5zU/ustfj4/EWBzi+lVsiJduY2jmVCH0ksqWnUUgFljiB1v8oc5uBX7gFybjXWOe5ZXjREfBVURhWDBMWdWAiuxqV/FwCv5ldi/zN+SzF+06mDtvaR2LykvREKHKUy6d+q23rT0UPVJqkqgQjFNKyxXjjj6huKeNcyVa9IWFU7Z+2/Gr7MCisdUoF/ObLX2irrlBD6S+apmC7JOYJvOrbD2CAzgUAQtRgJhaSqghxH7ldzwf4FY91/jlzrD03Mr8Z1D164yurOxeeKEjfJQqylOAKkcmoVFam5Yrok5yiWWvnN+M1CExyhmidI4ZakqoI8R/kTKVM+Hr9xdX7El4zoxRQ9Ca8lLs8PU+7TBKKRIxz40j3Axct3LS8MpY/HbxaGiA0c0fCjRQ+DRXYyghPvOHsnEguFNMsg40ici+w2NzOmugN2ohXTWdKuCDSBJ5TvLNvP54xr5wgMx+bUKodd5uahRa+k9xQbOGKp+mpqYLuxXnYm5l4xNVKRsYhKquoo5ChvJGvH3ERq2+g3MaakE8oEA+F6cPSYo5txne8nf2jnaDm9VuvLrtp53/LC+KIyX964ZG/gCIKPqxQ4VCRTy2FJryjUOFovjOq9llZID60mSg5MGSjrs8Nno8GyOKJFku/juUlaaEcUD5JqDj9zxPjvmLUpxjNCeJ3PoDGUaOFICEzhUIvfPJEIab9hP7sS3WvdFEeAGfOt50HhUMLOLlNTZ8C+/gbBzxwtri1/MtEvO0fIIVvH6EZqi0A7Rwg+MbWJu01+kzMWYMUoyZQuHNFKtty1KmTeTDeSgPX7PBJHnDMeDynu4HG1z07d0xKJBMriSAiNElxonWjIosHKUoQpXTgCZN4fjd0o7C9HCDjrSxOJI3KnW6FxUnLZCVkx1BkjvpKXN48KOBIimDpobftssp88RW3t04sjetQ379pmqC00xcJCTpefbhJHxJrvPIMMGdkJyAlHjyzOF0fFHOUFL5mA1A2KCb1eHAF/Mrrb0iwzhWCt1mdIPp06EkcEAlYufpNpw1qjzyh0NKI4R8z2wlYUpcbSQh8ko+ugI0fpTIaEuXBkYI1ULn+LSeLIvbzwqqVFpoq8ZGq0Lc0KHY0owhFt/9fYdday4jfChOy1XKg2R4BUS3H2HLC1Tz/NdSSOBsLuQqc58oa9M7yaEDoaUYQjvBmK+oxR3znPIJb5ZxGmtoYjkn7xpJ1MSAtY+ISOxFGj31gYvegDQ7FkgSZDcY5GE0EU4qnV0Xjw/zyD+62takxtDUes16xiMmsIbPQE7EJH4ui/x64XOor3532GVJmPW5TkSNLLrSz+ZOS8d+iQrX17rp/rfdgajsDvlDaCOHLWPSAUJI7edPbIlBBSgb75YS13oNZDO0cCXAOqnO+9j1lAyfJRE0xtGUeMg0KOMHhmpE8oSBwdtLbLlJA9lpb74SntmZFAuRwJkA2NJ0ItM+b3R66IRwq2jKNLc07FrRLKZqEgcbTHrJAmkKqbozNbwxGgIWLfZGKhO+A447pywNrGTJR+WwfdObqT23WTGUQO2tqFgsQRCa5Mg1ZZpF2x+S3jSIDmGFPhteWhiFfxmS7dOaIhxbynxnJBKEgcyX5GaPUdZ+9kIiQUtGOTHJWE7hyRACpucu8yNQmFYhydHr7kTiwIBe145jgajs3tV7r1xpIlFIpxdCo7jv7xORpLhA7ZOmQGhQgFiaPCwE6rJx094/F//LlGHw/ZFTiCE6EgcfRSwc0iWj1q73Rp3lrL45njiD5SnckMInAiFCSOdpsUahbOJJ5twbq2mk6Nx4Px9Gpaw8tof7eYTd0k00BqrBceR7xbwFF0Lfnvrr73XVcuzw1PJcJkSUUa1Z0jatc9SrtI+6ytQkHi6Ii9S6aBUBD3hybos9DRiMo4OuXM7l7tNDWRZ3fMWlkrqr0PmcfN0JjiBuxhe6dQkDg67bos00C2G+u7N94h0IKKOUKBrj5vOM+1eXf4Up3PQB1XyJTuHLXNWrPtbjSI4INQkDj6fPIOHZApceQ7zyO166mGzXAkRDC1w9hw1NEFU95kZP1Y1p2js+57in3/w0S/UJA46gk4FHe/fz16rdx3LDbPUV5wgFOIC3/zDk0vh5PpNYzry1E6kxHTXGYQNtpmLUJH4sgQ8RXewkao64Irqg/1KEJHjoQIpt6wd9Z6h6xLs6PxeR05ml+JKT7fABv3wlNCR+JoJhlVvCG3w9QAfUJHI3TnSAgs4PcxR/dnE/2vFOyuVszRw8VpxY0RBm++xpA4SqRXPxi5Ujjk6NX33kGhoxFV4kiIYEp2EKmMo8yTzFdTCsEIayyv+Vu1EkcEZqKjojaBM17Oe2cVcESg+Xb6AXltoQMapTKOFlbjB6ztnFtoLfd45Mb7a3TsXtit+E4RR8rKJCvgCHCRnLHAZ5M/1lhbGSmFbhQX9MvliB7dWZgsfEkaU8zl26Fx+X1aTnAnFk4oPW5Cxz5339X+olVlHAF8WE6vGSO+L90DROj1jxeVlAo4oq1PJ38sbEKYGi283w+WUitfuO8qBjAKN5fKM6eFqJgjATyLp1btS4F6v+Gks0cjU+VyRCvWpZnXlbZEYODTif717wH+zBFD69Lc8B5zc6FPrG7nfQaNL4VskiMBMaZY5ptnTLnHxuSmZFIuR0RAcq6XCraxsUOWr/r8EW6NJ0JvO3sLOeJI7mFITXtJRTj6V0PtSFwTRwB/wFomPZuMXvCb91mydytlBvNSLkdj8eAppecbsnYcGyYa+JkjALvfTD9Q3P/faWpsmTFX9jwkpzOA91havp6+H6v0wXZ/MsLKe9TeRf2JQVn3sn3TzBG9oC/ZlwDXWRCCn39yD8ge+N/AETBF/YqbKThxajg7lNYTrAgZR5y409z00dj1B4vT5ZZ+MqQymalEmBL0PVcfS896psriaCKxcNJ5MX/ueiHUwICk9xRyjhKpVRZgxVHN+Kr1Pi7r+WzsHLS2c/09y4vl7h+ogdkHUz1zjg9HfxBPbwrRyBFEn/MMqiWiv5+4vVz8+WzAMKElxXGIiRrNz/kzs14w1P3HyDVxm6zk6CsXLCDMvqvzrjMjV5gg2jkaivjUXgwmPVTcd5VzBGD6S/ddxaGE6becF4u/H5/jaPKwvbPZb4Yd/in9oDfoDGMTZ8j3Tjl7ibUl3xehgiWiKRJEf7+aGkhnFAa7AkfAm1w8bO9Qs0WORzKlNjQ4zsxyxubgWjpUfZBSkXyyAkr/LgBeUX/90X1HsVPP5XYd1W6UKXOUepJp8pvUPlBBvOwM2MhfJO1nARTtrTOW3UqPNdBHelrvN6qFWmWOYH1qOfzr0Wsyc3l5w9YxEHZrfKr97w78vMv0J6tWykUJZ8RNBpHazFDmCGCXea74tm72iKGOrPJZeZ+WdYYwis+K02KftfVmaLzI9VblCDD2WCYVuUcITEfsXRU8ELDFIKc7aFPYABFCL855B4uXWcU4AiwEZ1x9Mrt5oYGj9m5nLLDJ5LBKYGgwgkjQ8FPmuSSG86ddl0Pqb5gKlOAIQIHiU5VCaJ4S70F4ivxdbT5vPfAkkV4jYjLFVAky1r3p6JG9YqSI0hxlnmQGFz1FPqfBZOTXrll7pOh7tlsJkiZWMdIXtQ84PGfM1q4PF6e1xNPSHAGKwB+Co3strYo0iYMkr99MPYj+AmgKrsbJ4LLLvPp3a1iLrodGS9ZVApo4AkyljoCt5AeiGNuOpUC5j+LqBbJkY9R3TP07LEKo8uiL9jeptHIEyGVrvUO7NHxHq95nJNXeyuyJhYkV9nvv45Lf0YKg8z5DWR9wKIMjAE3ts1YSiuJ+vGisZ73oCtinq88Uw4H0D69YOorfLKDgOGht6wzYyyIIlMcRYNIRm7JvAxY4sV74dZe56b2RvpYZ83g8uFqN7/plUqxKjX7Tr4Yvi+0kmQ8yOeHouRka0z7F8iibI4Bzjxan33RKL9bLXMlL9ldjthQ6Zu/6euo+kaKs+3RqgJ3o2vKjRQ+BmUulVlRukFyCMhjxagzSMlTCEWDJ5Bq+5+or7V9OsklKdqu4u8FncMbmKvjQdY6aJDnhXz0PD9tKvLO0XlD7YORKkXKsJCrkSIBV9jvP4D5rm9jlkjmnKPTtRWPDYXvnb8ZvNviNV+dHGJKO2BwVA1W0d3nRl4zwX/4ei4dsS7Nkp33zLtaKD0d/oKQg4mhkBx28OmBrb/AZN/mhuE1xBFbSKUpfOlD4nEJxoQ/bcp/oJ5HZb217w95J1nvK2Utw4b/8/bq9Y2/2/4XQrJ2XvKBMNPxo7MbAgnvzddJmOQLZrfjlMLH5qKMrO6cKPNYodGy9yH7VLpxLeO6YtXmXI7rs8+nAEWCqs17A1F88DxkXm2FqMwI7NbmvnPqWsx9/qTgAyaAPR3ng1mg8+IX7LpmkuPewmRGhRYR96jIm5jfTD4jNum9p6cwRgCaClDMW+Mv0Q0qTPbmAQk/0JUsYJFnlYrw7fOmcd5Bro/Fue7nQn6M8mH3k2ZfnhklkSE/E+0/lRl+ZcC4WWLBes7QQ3b+evn8jOOZPRvS6eaeIKnIkQH0bS61MJcL3w1PNM+aPx24csXeyCNLVbRq+pS5IYQXkDyLdcUf3JxP9bbPWwUWPNxmhqtiCzeKqcyTABIQsRtZSamUmGbUuzVwLjp7zPIKyt5y9pEss/zWWltcsza+am/kvf5MNkUafGr70+/Fb9T7DrYVxx1IgsLIE48yprdxH3yKOnmH89NP/Aw7EcLI/Nvx9AAAAAElFTkSuQmCC"></image>
                    </div>
                    <h2 style="color:#487AA1">Merci de vous connecter</h2>
                    {{ Form::open(array('url' => 'test')) }}

                            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                <div class="input-field col s12">
                                    <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Pseudo" required autofocus>

                                    @if ($errors->has('username'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <div class="input-field col s12">
                                    <input id="password" type="password" class="form-control" name="password" placeholder="Mot de passe" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class='col s12'>
                                    {{ Form::submit('Se connecter', array('class' => 'waves-effect waves-light btn')) }}
                                    </div>
                                </div>
                            </div>
                            
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </center>
    </div>
</main>
@endsection
