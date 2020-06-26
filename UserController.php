public function addData(Request $request){
        $this->validate(
            $request,
            [
              /*
              Use as your requirement
              */
                'f_name' => 'required',
                'l_name' => 'required',
                'mobile' => 'required',
                'user_img' => 'required',
            ]
        );
        $user_img = '';
        if($request->hasFile('user_img'))
        {
            $filename_get = $request->file('user_img');
            $service_img = 'service_'.time().'.'.$filename_get->getClientOriginalExtension();
            $destiPath = storage_path('app/users/');
            $filename_get->move($destiPath, $user_img);
        }
        User::insert(
          array(
             'f_name' => $request->f_name,
             'l_name' => $request->l_name,
             'mobile' => $request->mobile,
             'service_img' => $user_img,
          )
      );
      return response()->json([
          'code' => 1,
          'msg' => 'User created successfully.'
      ]);
    }
