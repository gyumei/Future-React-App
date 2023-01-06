import React from "react";
import { Inertia } from "@inertiajs/inertia";
import { Link, useForm } from '@inertiajs/inertia-react';
import Authenticated from "@/Layouts/AuthenticatedLayout";
import './css/Setting.css';

const Setting = (props) => {
    
    const { my_id } = props;
    
    {/* フォームの登録 */}
    const {data, setData, post} = useForm({
        setting: "",
    })
    
    const handleSendPosts = (e) => {
        e.preventDefault();
        post(`/future/settingregister/${my_id}`);
    }

    return (
        <body>
            <div className="update-all">
                <div className="update-profile">
                    <form onSubmit={handleSendPosts}>
                        <label for="search">プロフィール設定</label>
                        <input type="text" size="20" onChange={(e) => setData("setting", e.target.value)}/>
                        <span className="text-red-600">{props.errors.profile}</span>
                        <button type="submit" className="p-1 bg-red-300 hover:bg-purple-400 rounded-md">send</button>
                    </form>
                </div>

                <div className="back-to-former">
	               <Link href={`/future/mypage/${my_id}`}>戻る</Link>
	             </div>
            </div>
        </body>
        );
}

export default Setting;