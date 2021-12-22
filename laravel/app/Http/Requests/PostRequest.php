<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class PostRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      'content' => 'required'
      // 'priprity_id' => 'required|regex:/[1-4]/',
      // 'deadline_date' => 'after:yesterday',
    ];
  }

  // /**
  //  * 定義済みバリデーションルールのエラーメッセージ取得
  //  *
  //  * @return array
  //  */
  // public function messages()
  // {
  //   return [
  //     'content.required' => 'タスクは必須です。'
  //     'content.max:20' => 'タスクは20文字以内で入力してください。',
  //     'priprity_id.required' => '優先順位の値がありません。',
  //     'priprity_id.regex' => '優先順位の値が規定外です。',
  //     'deadline_date.after:yesterday' => '日付の指定が間違っています。',
  //   ];
  // }

  //validationでエラーがでた時にjsonで返す。
  protected function failedValidation(Validator $validator)
  {
    $response = response()->json([
      'status' => 400, //jsonの返事の中身のエラー番号
      'errors' => $validator->errors(),
    ],400); //実際に送られるresponse codeが400番　これが無いと、jsonでエラーメッセージは返ってくるけど送れらてくるのは200番のstatusOKとくる。

    //例外を知らせる。
    //throw new 例外クラス名（例外message）
    throw new HttpResponseException($response);
  }
}
