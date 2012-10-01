        <div class="streams">
            <div class="row-fluid">
                <div class="span12">
                    <table width="100%" border="0" padding="0">
                        <tr>
                            {{#each streams}} 
                            <td>
                                <div class="header">
                                    <form class="form-inline">
                                        <input type="text" placeholder="{{term}}" />
                                        <div class="controls pull-right">
                                            <a href="#" class="btn">Ref</a>
                                            <a href="#" class="btn">Se</a>
                                            <a href="#" class="btn">></a>
                                        </div>
                                    </form>
                                </div>
                                <div class="stream">
                                    <div class="stream-inner">
                                        {{#each tweets}}
                                        <div class="tweet">
                                            <div class="img">
                                                <img src="{{image}}" />
                                            </div>
                                            <div class="content">
                                                <a href="#" class="author">{{author}}</a>
                                                <p>{{content}}</p>
                                            </div>
                                        </div>
                                        {{/each}}
                                    </div>
                                </div>
                            </td>
                            {{/each}}
                        </tr>
                    </table>
                </div>
            </div>
        </div>