import React from "react";
import { Inertia } from "@inertiajs/inertia";
import Authenticated from "@/Layouts/AuthenticatedLayout";
import { Link } from '@inertiajs/inertia-react';

const Collect = (props) => {
    const { search_users } = props;
    
    return (
            
            <div class="title-box3">
                <div class="title-box3-title"><h1>検索一覧</h1></div>
                <p class="content">
                { search_users.map((search_user) => (
                    <div key={search_user.id}>
                        <p class="content">検索結果：[ <Link href={`/future/otherpage/${search_user.id}`}>{ search_user.name }</Link>]</p>
                    </div>
                )) }
                </p>
                <Link href={`/future`}>戻る</Link>
            </div>
            
    );
}

export default Collect;