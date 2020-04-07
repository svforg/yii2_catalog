'use strict';

const model = '/product/';
const action = 'view';

const templatePath = '../view/' + model;
const phpFiles = './app/view/' + model + action + '/*.php';

import * as templateFile from '../tasks/template.js';

exports.build = () => {
    templateFile.template(phpFiles, templatePath)
};


