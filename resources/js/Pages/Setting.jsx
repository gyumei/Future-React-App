import React from "react";
import { Inertia } from "@inertiajs/inertia";
import { Link, useForm } from '@inertiajs/inertia-react';
import Authenticated from "@/Layouts/AuthenticatedLayout";
<<<<<<< HEAD
=======
import './css/Setting.css';
>>>>>>> 3759a0a (react導入後初めてのコミット)

const Setting = (props) => {
    
    const { my_id } = props;
    
    const {data, setData, post} = useForm({
        setting: "",
    })
    
    const handleSendPosts = (e) => {
        e.preventDefault();
        post(`/future/settingregister/${my_id}`);
    }

    return (
        <div>
            <form onSubmit={handleSendPosts}>
                <label for="search">プロフィール設定</label>
                <textarea  onChange={(e) => setData("setting", e.target.value)}></textarea>
                <button type="submit" className="p-1 bg-purple-300 hover:bg-purple-400 rounded-md">設定</button>
            </form>
<<<<<<< HEAD
            <Link href={`/future`}>戻る</Link>
=======
            <div className="button019">
	           <Link href={`/future`}>戻る</Link>
	        </div>
>>>>>>> 3759a0a (react導入後初めてのコミット)
        </div>
        );
}

export default Setting;