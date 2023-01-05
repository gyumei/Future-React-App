import React from "react";
import { Inertia } from "@inertiajs/inertia";
import Authenticated from "@/Layouts/AuthenticatedLayout";
import { Link, useForm } from '@inertiajs/inertia-react';
import './css/Register.css'
import { useState } from "react";
import axios from "axios";

const Future_register = (props) => {
    const {follow_users} = props;
    const {data, setData, post} = useForm({
        title:"",
        year: "",
        content: "",
        select_user:{},
        images:[],
        google:"",
    })
    
    const AttentionFunc = () => {
        alert('ctrlキーを押しながら選択すると複数ファイル選択することができます。')
    }
    
    const handleSendPosts = (e) => {
        　e.preventDefault();
          post(`/future/create`);
    }
    
    //checkedItemsは初期値を空のオブジェクトにする
    const [checkedItems, setCheckedItems] = useState({});
    
    const handleChange = (e) => {
  //checkedItemsのstateをセット
      setCheckedItems({
        ...checkedItems,
        [e.target.id]: e.target.checked
      });
      const dataPushArray = Object.entries({
        ...checkedItems,
        [e.target.id]: e.target.checked
      }).reduce((pre,[key, value])=>{
            value && pre.push(key)
            return pre
          },[]);
        setData("select_user",dataPushArray);
    }
    
    return (
            <body>
            <div className="box8">
                <title>タイムカプセル</title>
                <h1>投稿場所</h1>
                
                <p>投稿フォーム</p>
                <form onSubmit={handleSendPosts} enctype="multipart/form-data">
                    <input type="text" placeholder="ここにタイトルを入力" onChange={(e) => setData("title", e.target.value)}/>
                    <input type="datetime-local" min="2023-00-00T00:00" max="2100-12-31T23:59" onChange={(e) => setData("year", e.target.value)}/>
                    
                    <div className="text">
                        <label for="future-content">入力</label>
                        <p>500字まで自由に入力してください</p>
                        <textarea id="future-content" type="text" placeholder="テキストを入力" maxlength="500" onChange={(e) => setData("content", e.target.value)} required></textarea>
                    </div>
                    
                {
                (
                   ()=> {
                        if(follow_users === null) {
                        } else {
                        return (
                        <>
                        <div>この投稿をシェアしたいユーザーを選択してください</div>
                        <div className="box13">
                                <div>
                                    <p>名前</p>
                                    <hr/>
                                </div>
                                <div className="block">
                                { follow_users.map((follow_user) => (
                                <div key={follow_user.id}>
                                    <div className="element">
                                        <div>{ follow_user.id }</div>
                                        <div>
                                        <label htmlFor={`id_${follow_user.id}`} key={`key_${follow_user.id}`}>
                                        <input type="checkbox"id={`${follow_user.id}`} checked={checkedItems[follow_user.id]} value={follow_user} onChange={handleChange} />
                                        </label>
                                        </div>
                                        <div>{ follow_user.name }</div>
                                    </div>
                                </div>
                                )) }
                            </div>
                        </div>
                        </>
                         )
                        }
                        }
                    )
                ()
            }
            
                <div className="file">
                    <p>思い出の画像、動画ファイルを選択してください</p>
                    <div id="target">
                        <label class="upload-label">
                            ファイルを選択
                             <input type="file" id="fileBox" accept="image/*,video/mp4" multiple onChange={(e) => setData("images", e.target.files)}/>
                        </label>

                        <button onClick={AttentionFunc} className="c-button">注意</button>
                        <p id="msg">
                        </p>
                    </div>
                </div>
      
                <div className="checkbox">
                    <fieldset>
                        <legend>Google Calendarにこの投稿を登録する場合はここにチェックをつけてください</legend>
                        <div>
                            <input type="checkbox" id="scales" onChange={(e) => setData("google", e.target.value)}/>
                        </div>
                    </fieldset>
                </div>
                 <button type="submit" className="button btn btn-warning" id="submit_button">提出</button>
            </form>
            <div className="back-to-index">
	               <Link href={`/future`}>戻る</Link>
	           </div>
            
        </div>
        </body>
    );
}

export default Future_register;